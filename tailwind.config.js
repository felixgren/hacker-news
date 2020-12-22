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
        'gh-dark-banner': '#161b22',
        'gh-dark-bg': '#0d1117',
        'gh-dark-btn': '#21262d'
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
