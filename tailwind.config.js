module.exports = {
  purge: {
    mode: 'layers',
    content: ['./*.php', './partials/**/*.php', './template/*.php']
  },
  darkMode: false, // or 'media' or 'class'
  theme: {
    colors: {
      red: {
        DEFAULT: 'red',
        '800': 'dark-red',
      },
      white: {
        DEFAULT: 'white'
      }
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
