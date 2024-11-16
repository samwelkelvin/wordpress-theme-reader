module.exports = {
  "**/*.{css,js}": ["prettier --write"],

  "**/*.php": ["composer cs-fix"],
};
