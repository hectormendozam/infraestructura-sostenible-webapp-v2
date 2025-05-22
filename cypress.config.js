const { defineConfig } = require('cypress');

module.exports = defineConfig({
  reporter: '@shelex/cypress-allure-plugin',
  e2e: {
    setupNodeEvents(on, config) {
      require('@shelex/cypress-allure-plugin/writer')(on, config);
      return config;
    },
    baseUrl: 'http://http://localhost/infraestructura-corregida/src/screens/login.php' // ajusta si es necesario
  },
  env: {
    allure: true,
  }
});
