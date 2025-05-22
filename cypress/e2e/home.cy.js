describe('Carga del home', () => {
    it('Muestra la página principal', () => {
    cy.visit('/screens/login.php')
    cy.contains('Iniciar sesión') // Cambia por texto real visible
});
});
