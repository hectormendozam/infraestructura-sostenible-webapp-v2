describe('Carga del home', () => {
    it('Muestra la página principal', () => {
    cy.visit('/')
    cy.contains('Infraestructura Sostenible') // Cambia por texto real visible
});
});
