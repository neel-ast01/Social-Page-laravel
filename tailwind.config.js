export const darkMode = 'class';
export const content = [
  "./resources/**/*.blade.php",
  "./resources/**/*.js",
  "./resources/**/*.vue",
];
export const theme = {
  extend: {
    fontFamily: {
      poppins: ["'Poppins', sans-serif"],
    },
    

    fontSize: {
      'xx': '0.625rem', /* 10px */
      'xl': '1.313rem', /* 21px */
      '2xl': '1.5rem', /* 24px */
      '3xl': '1.75rem', /* 28px */
      '4xl': '2.375rem', /* 38px */
    },

    colors: {
      green: {
        50: '#f6f9ef',
        100: '#e7efd1',
        200: '#d7e4b4',
        300: '#c8da97',
        400: '#b8cf79',
        500: '#a9c55c',
        600: '#299617',
        700: '#227b13',
        800: '#4e5b2a',
        900: '#2f371a',
      },

      gray: {
        50: '#FAFCFC',
        100: '#ECF0F2',
        200: '#e3e3e3',
        300: '#DDDDDD',
        400: '#BABABA',
        500: '#424242',
        700: '#717171',
        800: '#1c1c1c',
        900: '#222222',
      },
    },

    width: {
      '25': '6.25rem', /* 100px */
      '588': '36.75rem', /* 588px */
      '690': '43.125rem', /* 690px */
      '560': '35rem', /* 560px */
    },

    maxWidth: {
      'screen-2xl': '90rem', /* 1440px */
      '560': '35rem', /* 560px */
    },

    height: {
      '15': '3.75rem', /* 59px */
      '327': '20.438rem', /* 327px */
      '340': '21.25rem', /* 340px */
    },
    minHeight: {
      '420': '26.25rem', /* 420px */
    },

    boxShadow: {
      'xl': '0px 2px 30px 10px rgba(34, 34, 34, 0.05)',
      'md': '0px 1px 5px rgba(0, 0, 0, 0.1)',
      'lg': '0px 2px 6px 2px rgba(34, 34, 34, 0.2)',
    },
    borderRadius: {
      '3xl': '1.25rem',
    },

    backgroundImage: {
      'close-icon': "url('../images/close.svg')",
      'back-arrow': "url('../images/back-arrow.svg')",
      'calender-icon': "url('../images/calendar_month.svg')",
      'location-icon': "url('../images/location_fill.svg')",
      'down-arrow': "url('../images/arrow-down.svg')",
      'checked-icon': "url('../images/checked.svg')",
      'checked-green': "url('../images/checked-green.svg')",
      'arrow-small': "url('../images/arrow-small.svg')",
    },
    screens: {
      //'xl': '1280px',
      'max-md': { 'max': '767px' },
      'max-lg': { 'max': '1023px' },
      'max-xl': { 'max': '1279px' },
    },
    lineClamp: {
      10: '10',
      15: '15',
      20: '20',
    },
  },
};
export const plugins = [
  require('@tailwindcss/line-clamp'),
];
