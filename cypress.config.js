const { defineConfig } = require('cypress');

module.exports = defineConfig({
  projectId: "hcytu5",
  //reporter: '@shelex/cypress-allure-plugin',
  reporterOptions: {
    outputDir: 'allure-results',
    overwrite: false,
    clean: true
  },
  e2e: {
    setupNodeEvents(on, config) {
      require('@shelex/cypress-allure-plugin/writer')(on, config);
      return config;
    },
    baseUrl: 'http://localhost/infraestructura-corregida/src' // ajusta según tu entorno
  },
  env: {
    allure: true
  }
});
