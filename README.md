# Relazioni in SQL

Mettiamo in relazione due tabelle per far sìiìi che i dati delle due siano collegati "concettualmente"

Solitamente (ma non è detto che sia così), nella relazione identifichiamo una tabella che definiremo INDIPENDENTE ed un'altra tabella che definiremo DIPENDENTE. Nello specifico, sempre solitamente, la tabella indipendente è quella che ha "senso di esistere" senza l'altra, mentre la tabella dipendente è quella che "non ha troppo senso di esistere" senza la tabella indipendente

Tabelle prese in esame: A e B

1. One-to-one:
Una singola riga della tabella A può essere collegata ad una ed una sola riga della tabella B e viceversa

Es. tabella utenti e tabella dettagli utente -> un utente (quindi, una singola riga di utenti) potrà essere collegato ad un solo dettaglio utente (quindi, ad una sola riga di dettagli_utente)

Per fare questo collegamento a livello di database, si inserisce una colonna nella tabella DIPENDENTE che contiene i riferimenti alle righe della tabella INDIPENDENTE. Nello specifico, su questa colonna si definisce anche un vincolo di FOREIGN KEY, in modo da creare dei link CONCRETI alle righe della tabella INDIPENDENTE

2. One-to-many
Una singola riga della tabella A può essere collegata a (eventualmente) più righe della tabella B, mentre una riga della tabella B può essere collegata solo ad una riga della tabella A

Es. tabella utenti e tabella articoli -> un utente (quindi una singola riga di utenti) potrà essere collegato ad uno o più articoli (cioè, ad una o più righe della tabella articoli)

Per fare questo collegamento a livello di database, si inserisce una colonna nella tabella DIPENDENTE che contiene i riferimenti alle righe della tabella INDIPENDENTE. Nello specifico, su questa colonna si definisce anche un vincolo di FOREIGN KEY, in modo da creare dei link CONCRETI alle righe della tabella INDIPENDENTE

3. Many-to-many
Una singola riga della tabella A può essere collegata a (eventualmente) più righe della tabella B e viceversa

Es. tabella articoli e tabella tag -> un articolo (quindi una singola riga di articoli) potrà essere associato a più tag. Ma a loro anche i singoli tag potranno essere associati a più articoli, creando così una "rete di connessioni"

Per fare questo collegamento a livello di database, non potendo inserire FK nelle due tabelle A e B (perché si creerebbe una relazione di tipo one-to-many), definiamo e costruiamo una terza tabella definita tabella ponte. Questa tabella conterrà, come minimo, 2 colonne contenenti i riferimenti alle righe delle tabelle A e B, rispettivamente
