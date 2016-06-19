
/*
Requête pour la page livredetail
*/

/* variable sql qui sera remplacé par la variable de type get en php*/
SET @idlivre = 4;

/* on récupère les détails du livre et les champs liés*/
SELECT  l.letitre, l.ladescription, l.lasortie,
		@idecrivain :=e.id as idecrivain,	e.lenom,
        p.id as idperiode, p.laperiode
	FROM livre l
    
    INNER JOIN ecrivain e
		ON e.id = l.ecrivain_id
        
	INNER JOIN periode p
		ON p.id = e.sciecle_id
        
	WHERE l.id = @idlivre;

    
/* on va récupérer tous les livres du même auteur SAUF celui sur lequel on se trouve déjà */
SELECT  l.id as idlivre, l.letitre
	FROM livre l
    
    INNER JOIN ecrivain e
		ON e.id = l.ecrivain_id
        
	WHERE l.id != @idlivre AND l.ecrivain_id = @idecrivain;
        
        
        
        
        
    