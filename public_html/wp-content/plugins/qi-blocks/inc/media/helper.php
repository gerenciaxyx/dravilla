<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! function_exists( 'qi_blocks_get_attachment_id_from_url' ) ) {
	/**
	 * Function that retrieves attachment id for passed attachment url
	 *
	 * @param string $attachment_url
	 *
	 * @return null|string
	 */
	function qi_blocks_get_attachment_id_from_url( $attachment_url ) {
		global $wpdb;
		$attachment_id = '';

		if ( '' !== $attachment_url ) {
			// phpcs:ignore WordPress.DB.DirectDatabaseQuery
			$attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE guid=%s", $attachment_url ) );

			// Additional check for undefined reason when guid is not image src.
			if ( empty( $attachment_id ) ) {
				$modified_url = substr( $attachment_url, strrpos( $attachment_url, '/' ) + 1 );

				// Get attachment id.
				// phpcs:ignore WordPress.DB.DirectDatabaseQuery
				$attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key='_wp_attached_file' AND meta_value LIKE %s", '%' . $modified_url . '%' ) );
			}
		}

		return $attachment_id;
	}
}

if ( ! function_exists( 'qi_blocks_resize_image' ) ) {
	/**
	 * Function that generates custom thumbnail for given attachment
	 *
	 * @param int|string $attachment - attachment id or url of image to resize
	 * @param array $custom_size desired - width and height of custom thumbnail
	 * @param bool $crop - whether to crop image or not
	 *
	 * @return array returns array containing img_url, width and height
	 *
	 * @see qi_blocks_get_attachment_id_from_url()
	 * @see get_attached_file()
	 * @see wp_get_attachment_url()
	 * @see wp_get_image_editor()
	 */
	function qi_blocks_resize_image( $attachment, $custom_size = array(), $crop = true ) {
		$return_array = array();

		if ( ! empty( $attachment ) ) {
			if ( is_int( $attachment ) ) {
				$attachment_id = $attachment;
			} else {
				$attachment_id = qi_blocks_get_attachment_id_from_url( $attachment );
			}

			$is_size_set = ! empty( $custom_size ) && isset( $custom_size['width'] ) && isset( $custom_size['height'] );

			if ( ! empty( $attachment_id ) && $is_size_set ) {
				$width  = intval( $custom_size['width'] );
				$height = intval( $custom_size['height'] );

				// Get file path of the attachment.
				$img_path = get_attached_file( $attachment_id );

				// Get attachment url.
				$img_url = wp_get_attachment_url( $attachment_id );

				// Break down img path to array, so we can use its components in building thumbnail path.
				$img_path_array = pathinfo( $img_path );

				// Build thumbnail path.
				$new_img_path = $img_path_array['dirname'] . '/' . $img_path_array['filename'] . '-' . $width . 'x' . $height . '.' . $img_path_array['extension'];

				// Build thumbnail url.
				$new_img_url = str_replace( $img_path_array['filename'], $img_path_array['filename'] . '-' . $width . 'x' . $height, $img_url );

				// Check if thumbnail exists by its path.
				if ( ! file_exists( $new_img_path ) ) {
					// Get image manipulation object.
					$image_object = wp_get_image_editor( $img_path );

					if ( ! is_wp_error( $image_object ) ) {
						// Resize image and save it new to path.
						$image_object->resize( $width, $height, $crop );
						$image_object->save( $new_img_path );

						// Get sizes of newly created thumbnail.
						// We don't use $width and $height because those might differ from end result based on $crop parameter.
						$image_sizes = $image_object->get_size();

						$width  = $image_sizes['width'];
						$height = $image_sizes['height'];

						qi_blocks_update_cropped_images_option( $attachment_id, $width, $height );
					} else {
						return array();
					}
				}

				// Generate data to be returned.
				$return_array = array(
					'url'    => $new_img_url,
					'width'  => $width,
					'height' => $height,
				);

				// Attachment wasn't found in gallery, but it is not empty.
			} elseif ( '' !== $attachment && $is_size_set ) {
				$width  = intval( $custom_size['width'] );
				$height = intval( $custom_size['height'] );

				// Generate data to be returned.
				$return_array = array(
					'url'    => $attachment,
					'width'  => $width,
					'height' => $height,
				);
			}
		}

		return $return_array;
	}
}

if ( ! function_exists( 'qi_blocks_update_cropped_images_option' ) ) {
	function qi_blocks_update_cropped_images_option( $attachment_id, $width, $height ) {
		$cropped_images = get_option( 'qi_blocks_cropped_images' );

		$cropped_images[] = array(
			'attachment_id' => $attachment_id,
			'width'         => $width,
			'height'        => $height,
		);

		update_option( 'qi_blocks_cropped_images', $cropped_images );
	}
}
