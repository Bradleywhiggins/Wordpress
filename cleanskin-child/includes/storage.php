<?php
/**
 * Theme storage manipulations
 *
 * @package WordPress
 * @subpackage CLEANSKIN
 * @since CLEANSKIN 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) {
	exit; }

// Get theme variable
if ( ! function_exists( 'cleanskin_storage_get' ) ) {
	function cleanskin_storage_get( $var_name, $default = '' ) {
		global $CLEANSKIN_STORAGE;
		return isset( $CLEANSKIN_STORAGE[ $var_name ] ) ? $CLEANSKIN_STORAGE[ $var_name ] : $default;
	}
}

// Set theme variable
if ( ! function_exists( 'cleanskin_storage_set' ) ) {
	function cleanskin_storage_set( $var_name, $value ) {
		global $CLEANSKIN_STORAGE;
		$CLEANSKIN_STORAGE[ $var_name ] = $value;
	}
}

// Check if theme variable is empty
if ( ! function_exists( 'cleanskin_storage_empty' ) ) {
	function cleanskin_storage_empty( $var_name, $key = '', $key2 = '' ) {
		global $CLEANSKIN_STORAGE;
		if ( ! empty( $key ) && ! empty( $key2 ) ) {
			return empty( $CLEANSKIN_STORAGE[ $var_name ][ $key ][ $key2 ] );
		} elseif ( ! empty( $key ) ) {
			return empty( $CLEANSKIN_STORAGE[ $var_name ][ $key ] );
		} else {
			return empty( $CLEANSKIN_STORAGE[ $var_name ] );
		}
	}
}

// Check if theme variable is set
if ( ! function_exists( 'cleanskin_storage_isset' ) ) {
	function cleanskin_storage_isset( $var_name, $key = '', $key2 = '' ) {
		global $CLEANSKIN_STORAGE;
		if ( ! empty( $key ) && ! empty( $key2 ) ) {
			return isset( $CLEANSKIN_STORAGE[ $var_name ][ $key ][ $key2 ] );
		} elseif ( ! empty( $key ) ) {
			return isset( $CLEANSKIN_STORAGE[ $var_name ][ $key ] );
		} else {
			return isset( $CLEANSKIN_STORAGE[ $var_name ] );
		}
	}
}

// Inc/Dec theme variable with specified value
if ( ! function_exists( 'cleanskin_storage_inc' ) ) {
	function cleanskin_storage_inc( $var_name, $value = 1 ) {
		global $CLEANSKIN_STORAGE;
		if ( empty( $CLEANSKIN_STORAGE[ $var_name ] ) ) {
			$CLEANSKIN_STORAGE[ $var_name ] = 0;
		}
		$CLEANSKIN_STORAGE[ $var_name ] += $value;
	}
}

// Concatenate theme variable with specified value
if ( ! function_exists( 'cleanskin_storage_concat' ) ) {
	function cleanskin_storage_concat( $var_name, $value ) {
		global $CLEANSKIN_STORAGE;
		if ( empty( $CLEANSKIN_STORAGE[ $var_name ] ) ) {
			$CLEANSKIN_STORAGE[ $var_name ] = '';
		}
		$CLEANSKIN_STORAGE[ $var_name ] .= $value;
	}
}

// Get array (one or two dim) element
if ( ! function_exists( 'cleanskin_storage_get_array' ) ) {
	function cleanskin_storage_get_array( $var_name, $key, $key2 = '', $default = '' ) {
		global $CLEANSKIN_STORAGE;
		if ( empty( $key2 ) ) {
			return ! empty( $var_name ) && ! empty( $key ) && isset( $CLEANSKIN_STORAGE[ $var_name ][ $key ] ) ? $CLEANSKIN_STORAGE[ $var_name ][ $key ] : $default;
		} else {
			return ! empty( $var_name ) && ! empty( $key ) && isset( $CLEANSKIN_STORAGE[ $var_name ][ $key ][ $key2 ] ) ? $CLEANSKIN_STORAGE[ $var_name ][ $key ][ $key2 ] : $default;
		}
	}
}

// Set array element
if ( ! function_exists( 'cleanskin_storage_set_array' ) ) {
	function cleanskin_storage_set_array( $var_name, $key, $value ) {
		global $CLEANSKIN_STORAGE;
		if ( ! isset( $CLEANSKIN_STORAGE[ $var_name ] ) ) {
			$CLEANSKIN_STORAGE[ $var_name ] = array();
		}
		if ( '' === $key ) {
			$CLEANSKIN_STORAGE[ $var_name ][] = $value;
		} else {
			$CLEANSKIN_STORAGE[ $var_name ][ $key ] = $value;
		}
	}
}

// Set two-dim array element
if ( ! function_exists( 'cleanskin_storage_set_array2' ) ) {
	function cleanskin_storage_set_array2( $var_name, $key, $key2, $value ) {
		global $CLEANSKIN_STORAGE;
		if ( ! isset( $CLEANSKIN_STORAGE[ $var_name ] ) ) {
			$CLEANSKIN_STORAGE[ $var_name ] = array();
		}
		if ( ! isset( $CLEANSKIN_STORAGE[ $var_name ][ $key ] ) ) {
			$CLEANSKIN_STORAGE[ $var_name ][ $key ] = array();
		}
		if ( '' === $key2 ) {
			$CLEANSKIN_STORAGE[ $var_name ][ $key ][] = $value;
		} else {
			$CLEANSKIN_STORAGE[ $var_name ][ $key ][ $key2 ] = $value;
		}
	}
}

// Merge array elements
if ( ! function_exists( 'cleanskin_storage_merge_array' ) ) {
	function cleanskin_storage_merge_array( $var_name, $key, $value ) {
		global $CLEANSKIN_STORAGE;
		if ( ! isset( $CLEANSKIN_STORAGE[ $var_name ] ) ) {
			$CLEANSKIN_STORAGE[ $var_name ] = array();
		}
		if ( '' === $key ) {
			$CLEANSKIN_STORAGE[ $var_name ] = array_merge( $CLEANSKIN_STORAGE[ $var_name ], $value );
		} else {
			$CLEANSKIN_STORAGE[ $var_name ][ $key ] = array_merge( $CLEANSKIN_STORAGE[ $var_name ][ $key ], $value );
		}
	}
}

// Add array element after the key
if ( ! function_exists( 'cleanskin_storage_set_array_after' ) ) {
	function cleanskin_storage_set_array_after( $var_name, $after, $key, $value = '' ) {
		global $CLEANSKIN_STORAGE;
		if ( ! isset( $CLEANSKIN_STORAGE[ $var_name ] ) ) {
			$CLEANSKIN_STORAGE[ $var_name ] = array();
		}
		if ( is_array( $key ) ) {
			cleanskin_array_insert_after( $CLEANSKIN_STORAGE[ $var_name ], $after, $key );
		} else {
			cleanskin_array_insert_after( $CLEANSKIN_STORAGE[ $var_name ], $after, array( $key => $value ) );
		}
	}
}

// Add array element before the key
if ( ! function_exists( 'cleanskin_storage_set_array_before' ) ) {
	function cleanskin_storage_set_array_before( $var_name, $before, $key, $value = '' ) {
		global $CLEANSKIN_STORAGE;
		if ( ! isset( $CLEANSKIN_STORAGE[ $var_name ] ) ) {
			$CLEANSKIN_STORAGE[ $var_name ] = array();
		}
		if ( is_array( $key ) ) {
			cleanskin_array_insert_before( $CLEANSKIN_STORAGE[ $var_name ], $before, $key );
		} else {
			cleanskin_array_insert_before( $CLEANSKIN_STORAGE[ $var_name ], $before, array( $key => $value ) );
		}
	}
}

// Push element into array
if ( ! function_exists( 'cleanskin_storage_push_array' ) ) {
	function cleanskin_storage_push_array( $var_name, $key, $value ) {
		global $CLEANSKIN_STORAGE;
		if ( ! isset( $CLEANSKIN_STORAGE[ $var_name ] ) ) {
			$CLEANSKIN_STORAGE[ $var_name ] = array();
		}
		if ( '' === $key ) {
			array_push( $CLEANSKIN_STORAGE[ $var_name ], $value );
		} else {
			if ( ! isset( $CLEANSKIN_STORAGE[ $var_name ][ $key ] ) ) {
				$CLEANSKIN_STORAGE[ $var_name ][ $key ] = array();
			}
			array_push( $CLEANSKIN_STORAGE[ $var_name ][ $key ], $value );
		}
	}
}

// Pop element from array
if ( ! function_exists( 'cleanskin_storage_pop_array' ) ) {
	function cleanskin_storage_pop_array( $var_name, $key = '', $defa = '' ) {
		global $CLEANSKIN_STORAGE;
		$rez = $defa;
		if ( '' === $key ) {
			if ( isset( $CLEANSKIN_STORAGE[ $var_name ] ) && is_array( $CLEANSKIN_STORAGE[ $var_name ] ) && count( $CLEANSKIN_STORAGE[ $var_name ] ) > 0 ) {
				$rez = array_pop( $CLEANSKIN_STORAGE[ $var_name ] );
			}
		} else {
			if ( isset( $CLEANSKIN_STORAGE[ $var_name ][ $key ] ) && is_array( $CLEANSKIN_STORAGE[ $var_name ][ $key ] ) && count( $CLEANSKIN_STORAGE[ $var_name ][ $key ] ) > 0 ) {
				$rez = array_pop( $CLEANSKIN_STORAGE[ $var_name ][ $key ] );
			}
		}
		return $rez;
	}
}

// Inc/Dec array element with specified value
if ( ! function_exists( 'cleanskin_storage_inc_array' ) ) {
	function cleanskin_storage_inc_array( $var_name, $key, $value = 1 ) {
		global $CLEANSKIN_STORAGE;
		if ( ! isset( $CLEANSKIN_STORAGE[ $var_name ] ) ) {
			$CLEANSKIN_STORAGE[ $var_name ] = array();
		}
		if ( empty( $CLEANSKIN_STORAGE[ $var_name ][ $key ] ) ) {
			$CLEANSKIN_STORAGE[ $var_name ][ $key ] = 0;
		}
		$CLEANSKIN_STORAGE[ $var_name ][ $key ] += $value;
	}
}

// Concatenate array element with specified value
if ( ! function_exists( 'cleanskin_storage_concat_array' ) ) {
	function cleanskin_storage_concat_array( $var_name, $key, $value ) {
		global $CLEANSKIN_STORAGE;
		if ( ! isset( $CLEANSKIN_STORAGE[ $var_name ] ) ) {
			$CLEANSKIN_STORAGE[ $var_name ] = array();
		}
		if ( empty( $CLEANSKIN_STORAGE[ $var_name ][ $key ] ) ) {
			$CLEANSKIN_STORAGE[ $var_name ][ $key ] = '';
		}
		$CLEANSKIN_STORAGE[ $var_name ][ $key ] .= $value;
	}
}

// Call object's method
if ( ! function_exists( 'cleanskin_storage_call_obj_method' ) ) {
	function cleanskin_storage_call_obj_method( $var_name, $method, $param = null ) {
		global $CLEANSKIN_STORAGE;
		if ( null === $param ) {
			return ! empty( $var_name ) && ! empty( $method ) && isset( $CLEANSKIN_STORAGE[ $var_name ] ) ? $CLEANSKIN_STORAGE[ $var_name ]->$method() : '';
		} else {
			return ! empty( $var_name ) && ! empty( $method ) && isset( $CLEANSKIN_STORAGE[ $var_name ] ) ? $CLEANSKIN_STORAGE[ $var_name ]->$method( $param ) : '';
		}
	}
}

// Get object's property
if ( ! function_exists( 'cleanskin_storage_get_obj_property' ) ) {
	function cleanskin_storage_get_obj_property( $var_name, $prop, $default = '' ) {
		global $CLEANSKIN_STORAGE;
		return ! empty( $var_name ) && ! empty( $prop ) && isset( $CLEANSKIN_STORAGE[ $var_name ]->$prop ) ? $CLEANSKIN_STORAGE[ $var_name ]->$prop : $default;
	}
}
