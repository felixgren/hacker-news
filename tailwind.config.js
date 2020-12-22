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
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
