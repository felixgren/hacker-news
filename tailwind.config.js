module.exports = {
  purge: [ // Purge all unused styles in prod builds for these paths
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: 'media', // or 'media' or 'class' (default: false)
  theme: {
    extend: {
      colors: {
        'hacker-orange': '#ff6600',
        'black-gh-bg': '#06090f',
        'dark-gh-bg': '#0d1117',
        'dark-gh-banner': '#161b22',
        'dark-gh-btn': '#21262d',
        'dark-gh-border': '#30363d1A'
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
