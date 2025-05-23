import clsx from 'clsx';
import { __ } from '@wordpress/i18n';
import { twMerge } from 'tailwind-merge';

export const classNames = ( ...classes ) => twMerge( clsx( classes ) );

/**
 * Formats a number to display in a human-readable format.
 *
 * @param {number} num - The number to format.
 * @return {string} The formatted number.
 */
export const formatNumber = ( num ) => {
	if ( ! num ) {
		return '0';
	}
	const thresholds = [
		{ magnitude: 1e12, suffix: 'T' },
		{ magnitude: 1e9, suffix: 'B' },
		{ magnitude: 1e6, suffix: 'M' },
		{ magnitude: 1e3, suffix: 'K' },
		{ magnitude: 1, suffix: '' },
	];

	const { magnitude, suffix } = thresholds.find(
		( { magnitude: magnitudeValue } ) => num >= magnitudeValue
	);

	const formattedNum = ( num / magnitude ).toFixed( 1 ).replace( /\.0$/, '' );

	return num < 1000
		? num.toString()
		: formattedNum + suffix + ( num % magnitude > 0 ? '+' : '' );
};

/**
 * Get color className based on the percentage.
 *
 * @param {number} percentage - The percentage.
 * @return {string} - The color className.
 */
export const getColorClass = ( percentage ) => {
	const colorClassNames = {
		default: '',
		warning: 'text-credit-warning',
		danger: 'text-credit-danger',
	};

	if ( percentage <= 10 ) {
		return colorClassNames.danger;
	} else if ( percentage <= 20 ) {
		return colorClassNames.warning;
	}
	return colorClassNames.default;
};

export const SITE_CREATION_STATUS_CODES = {
	A001: __( 'Downloading the images in media library…', 'ai-builder' ),
	A002: __( 'Downloading the images in media library…', 'ai-builder' ),
	A003: __( 'Adding interactive elements to engage visitors…', 'ai-builder' ),
	A004: __(
		'Crafting compelling copy that speaks to audience…',
		'ai-builder'
	),
	A005: __( 'Optimizing website for performance and speed…', 'ai-builder' ),
	A006: __( 'Adding essential features to engage visitors…', 'ai-builder' ),
	A007: __(
		'Optimizing SEO settings to boost online presence…',
		'ai-builder'
	),
	A008: __( 'Finalizing website layout and structure…', 'ai-builder' ),
	A009: __(
		'Testing functionality across different browsers…',
		'ai-builder'
	),
	A010: __(
		"It's taking a bit more than usual. Bear with us…",
		'ai-builder'
	),
	A011: 'Done',
	R001: __(
		'Oops, Site creation hiccupped, we are trying one more time',
		'ai-builder'
	),
	F001: __(
		"Oops, our site creation magic misfired! We couldn't create your site. Please try again…",
		'ai-builder'
	),
};

/**
 * Get data from local storage.
 *
 * @param {string} key
 * @return {Object} - The value from local storage.
 */
export const getLocalStorageItem = ( key ) => {
	try {
		if ( typeof window === 'undefined' ) {
			return null;
		}
		const value = localStorage.getItem( key );
		return value ? JSON.parse( value ) : null;
	} catch ( error ) {
		// Handle error (e.g., data is not JSON, localStorage is not available, etc.)
		return null;
	}
};

/**
 *  Set data to local storage.
 *
 * @param {string} key   - The key to set.
 * @param {Object} value - The value to set.
 *  @return {void}
 */
export const setLocalStorageItem = ( key, value ) => {
	try {
		if ( typeof window === 'undefined' ) {
			return;
		}
		localStorage.setItem( key, JSON.stringify( value ) );
	} catch ( error ) {
		// Handle error (e.g., localStorage is full, etc.)
	}
};

export const removeLocalStorageItem = ( key ) => {
	try {
		if ( typeof window === 'undefined' ) {
			return;
		}
		localStorage.removeItem( key );
	} catch ( error ) {
		console.error( 'Error while removing localStorage:', error );
	}
};

export const getPercent = ( num, den ) => {
	if ( typeof num !== 'number' || typeof den !== 'number' ) {
		return 0;
	}
	return ( num / den ) * 100;
};

export const toastBody = ( error ) => {
	let { title, message, code } = error;

	if ( 'internal_server_error' === code ) {
		message = error?.data?.error?.message || message;
	}

	const cleanMessage = message?.replace( /<\/?p>/g, '' );

	return !! title && !! message ? (
		<div className="min-w-[224px]">
			<p className="text-sm font-semibold text-white leading-5">
				{ title }
			</p>
			<p
				className="mt-1 text-sm font-normal text-white leading-5"
				dangerouslySetInnerHTML={ { __html: cleanMessage } }
			></p>
		</div>
	) : (
		<span
			className="!text-white text-sm min-w-[224px]"
			dangerouslySetInnerHTML={ { __html: cleanMessage } }
		></span>
	);
};

export const getScreenWidthBreakPoint = () => {
	const width = window.innerWidth;

	/** Tailwind CSS breakpoints */
	const breakpoints = {
		/** ExtraSmall */
		xs: 512,
		/** Small */
		sm: 640,
		/** Medium */
		md: 768,
		/** Large */
		lg: 1024,
		/** Extra Large */
		xl: 1280,
		/** 2x Extra Large */
		'2xl': 1536,
	};

	/**
	 *  Iterate through the breakpoints and return the first one
	 *  where the width is less than or equal to the breakpoint.
	 */
	for ( const breakpoint in breakpoints ) {
		if ( width <= breakpoints[ breakpoint ] ) {
			return breakpoint;
		}
	}
};
