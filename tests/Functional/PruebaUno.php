<?php
$I = new FunctionalTester($scenario);
$I->wantTo('verificar que el home carga');
$I->amOnPage('/');
$I->see('Infraestructura Sostenible'); // Cambia por texto visible real
