module.exports = {
  purge: {
    mode: 'layers',
    content: ['./*.php', './partials/**/*.php', './template/*.php']
  },
  darkMode: false, // or 'media' or 'class'
  theme: {
    colors: {
      grey: {
        '100': '#fafafa',
        '200': '#f5f5f5',
        '300': '#eeeeee',
        '500': '#bdbdbd',
        '700': '#757575'
      },
      red: {
        DEFAULT: 'red',
        '800': 'dark-red',
      },
      white: {
        DEFAULT: 'white'
      },
      green: {
        DEFAULT: '#047857',
        '800': '#064E3B',
      },
      overlay : {
        DEFAULT: 'rgba(0, 0, 0, 0.5)'
      },
      blue: {
        DEFAULT: 'blue',
        '800': 'darkblue',
      },
      black: 'black',
      transparent: 'transparent',
      'button-bg': 'var(--button-colour)',
      'button-text': 'var(--button-text)',
      'button-hover': 'var(--button-hover)'
    },
    extend: {
      rotate: {
        '225': '225deg'
      }
    }
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
