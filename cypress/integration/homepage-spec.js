/// <references types="cypress" />

describe('Homepage', function(){
    
    
    it('Prueba del Heading', () => {
        cy.visit('/');

        cy.get('[data-cy="heading-sitio"]').should('exist');
        cy.get('[data-cy="heading-sitio"]').invoke('text').should('equal', 'Venta de Casas y Departamentos Exclusivos de Lujos');
        cy.get('[data-cy="heading-sitio"]').invoke('text').should('not.equal', 'Hola soy texto que no debo existir');

    });



    it('Prueba del bloque Icons', function(){

        cy.get('[data-cy="heading-nosotros"]').should('have.prop','tagName').should('equal','H2');

        // Selecciona iconos
        cy.get('[data-cy="iconos-nosotros"').should('exist');
        cy.get('[data-cy="iconos-nosotros"').find('.icono').should('have.length', 3);
        cy.get('[data-cy="iconos-nosotros"').find('.icono').should('not.have.length', 4);

    });

    it('Prueba del bloque Propiedades', () => {

        cy.get('[data-cy="heading-propiedades"]').should('exist')
        cy.get('[data-cy="heading-propiedades"]').invoke('text').should('equal', 'Casas y Departamentos en Ventas');

        cy.get('[data-cy="bloque-propiedad"]').should('exist');
        cy.get('[data-cy="bloque-propiedad"]').should('have.length', 3);
        cy.get('[data-cy="bloque-propiedad"]').should('not.have.length', 5);
        cy.get('[data-cy="bloque-propiedad"]').should('have.class', 'anuncios');

        cy.get('[data-cy="enlace-propiedad"]').should('have.class', 'boton-amarillo');
        cy.get('[data-cy="enlace-propiedad"]').should('not.have.class', 'boton-amarillo_contact');
        cy.get('[data-cy="enlace-propiedad"]').first().invoke('text').should('equal','Ver Propiedad');
        
        cy.get('[data-cy="enlace-propiedad"]').first().click();
        cy.get('[data-cy="titulo-propiedad"]').should('exist');
        cy.get('[data-cy="titulo-propiedad"]').should('have.prop','tagName').should('equal','H1');
        
        cy.wait(1000);
        cy.go('back');

    });
})