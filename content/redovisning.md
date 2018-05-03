---
...
Redovisning
=========================
<nav class="nav-redovisning">
    <ul>
        <li><a href="#kmom01">Kmom01</a></li>
        <li><a href="#kmom02">Kmom02</a></li>
        <li><a href="#kmom03">Kmom03</a></li>
        <li><a href="#kmom04">Kmom04</a></li>
        <li><a href="#kmom05">Kmom05</a></li>
        <li><a href="#kmom06">Kmom06</a></li>
        <li><a href="#kmom10">Kmom07-10</a></li>
    </ul>
</nav>


<a name="kmom01"></a><h2>Kursmoment 01</h2>

####Hur känns det att hoppa rakt in i objekt och klasser med PHP, gick det bra och kan du relatera till andra objektorienterade språk?
Jag tyckte att det gick bra att börja med objekt och klasser i PHP. Jag har tidigare programmerat en hel del i C# så jag känner igen
mig i en hel del. Problemet var mer att jag glömt bort en hel del PHP, så som sessioner. Jag kan relatera objektorienterad PHP till
både C# och Java.

####Berätta hur det gick det att utföra uppgiften “Gissa numret” med GET, POST och SESSION?
Jag hade inga större problem med GET och POST. Däremot tyckte jag det var svårt med sessions uppgiften.
Efter en hel del slarvfel och läsande så lossnade det till slut och jag fick den att fungera.

####Har du några inledande reflektioner kring me-sidan och dess struktur?
Strukturen känner jag delvis igen från design-kursen. Det är ganska många filer och jag känner
att det kommer ta ett tag innan jag känner mig helt bekväm med strukturen.

####Vilken är din TIL för detta kmom?
Min TIL denna vecka är hur jag kan dela upp koden i flera olika filer för att få en bättre
struktur och "återanvända" den.

####Övrigt
Jag gjorde extrauppgiften i "Bygg en me-sida för oophp med Anax" och la lite extra krut på stylen och
är nöjd med resultatet. Jag kännde att jag tappat en hel del av markdown syntaxen så på sidan "Lek"
gjorde jag en liten lathund för markdown så jag alltid har nära till den.  



<a name="kmom02"></a><h2>Kursmoment 02</h2>

####Hur gick det att överföra spelet “Gissa mitt nummer” in i din me-sida?
Överföringen gick bra. Mycket tack vare den tydliga videoserien. Det enda större problemet jag stötte på var
att jag missade ändra router till "$app->router->any(["GET", "POST"])" när jag flyttade över sessions varianten,
vilket tog lite tid att komma på.

####Berätta om hur du löste uppgiften med Tärningsspelet 100, hur du tänkte, planerade och utförde uppgiften samt hur du organiserade din kod?
Jag tyckte tärningsspelet var en svår uppgift. Jag gjorde spelet utanför ramverket för att sedan föra över det på samma sätt
som i den tidigare uppgiften. Jag gjorde på detta sättet eftersom jag tycker det blir lättare att felsöka och ändra utanför
ramverket.

Jag utgick från klasserna som jag skapat i uppgiften "Kom igång med objektorienterad programmering i PHP". Jag skapade sedan
en klass, "DiceLogic", för att hantera allt som har med spelet att göra.

Jag arbetade ganska metodiskt och fick en del i taget att fungera. Jag började med att få spelarens poäng att räknas samman, räkna ihop totalen och sen få det att fungera för datorn. När allt detta fungerade som jag ville implementerade jag att ettor
nollställde poängen och till slut la jag till grafiska tärningar.

####Berätta om din syn på modellering likt UML jämfört med verktyg som phpDocumentor. Fördelar, nackdelar, användningsområde? Vad tycker du om konceptet make doc?
Jag har använt mig av UML modellering tidigare och känner mig bekväm med det. Det är dock inget som jag föredrar att göra även om jag ser fördelarna med att ha en tydlig och strukturerad bild över klasserna. Jag tycker att det tar tid att göra från
grunden i program som Draw.io.

Konceptet mace doc tycker jag är väldigt bra och det kan nog leda till att jag kommer dokumentera min kod bättre och mer i framtiden.

####Hur känns det att skriva kod utanför och inuti ramverket, ser du fördelar och nackdelar med de olika sätten?
Vid en första anblick så verkade det väldigt komplicerat att skriva kod i ramverket men tack vare videoguiden så klarnade allt
och det visade sig inte vara så svårt.

Tycker dock att det är smidigare att skriva koden utanför ramverket för att sedan lyfta in den. Det blir mindre antal filer
att hantera och felsöka.

####Vilken är din TIL för detta kmom?
Jag har många TIL för detta kursmoment, främst namespace och skriva kod i ramverket men även användandet av phpDocumentor.

####Övrigt
Jag gjorde extrauppgifterna i uppgiften "Flytta spelet Gissa mitt nummer till me-sidan" och la till både GET och POST varianterna.

Kursmomentet kändes väldigt stort och det var mycket som var nytt.


<a name="kmom03"></a><h2>Kursmoment 03</h2>

####Har du tidigare erfarenheter av att skriva kod som testar annan kod?
Jag har tidigare använt mig av kod som testar kod. Dock inte i PHP utan i C# så det var en ny erfarenhet även, om de två påminner mycket om varandra.

####Hur ser du på begreppen enhetstestning och att skriva testbar kod?
Begreppet enhetstestning ser jag som ett tydligt och säkert sätt att testa så koden och funktionerna fungerar på det sättet som utvecklaren har tänkt.

Jag har tidigare dragit mig för att använda enhetstestning eftersom jag har tänkt att det är dubbelt arbete. Uppgiften och litteraturen har fått mig att ändra uppfattning om detta. Jag känner att jag kommer använda mig en hel del av enhetstester i kommande projekt i alla fall större projekt. Det är ju rätt tillfredställande att se alla gröna staplar.

####Förklara kort begreppen white/grey/black box testing samt positiva och negativa tester, med dina egna ord.
White box testning är när den som utför testningen har full tillgång till all kod. Fördelen med denna metod är att man kan kontrollera att all kod fungerar och man kan mäta kodteckningen.

Gray box testning är en blandning av white och black box testning. Den som utför testningen har en viss tillgång till källkoden och även dokumentation som beskriver hur systemet ska fungera.

Black box testning är motsatsen till white box. Här behöver man inte ha tillgång till källkoden utan man testar olika funktioner i systemet, till exempel inloggningar.

Positiva tester görs för att kontrollera att koden gör vad det är tänkt att den ska göra. Negativa tester kontrollerar felhantering som om exceptions kastas.

####Hur gick det att genomföra uppgifterna med enhetstester, använde du egna klasser som bas för din testning?
Jag kände mig ganska vilsen när jag började med uppgiften och kollade genom koden. Efter att jag läst README-filen och artiklarna så började det klarna och koden blev tydligare.

Jag valde att använda klasserna som följde med i mappen istället för att använda mina egna klasser. Detta gjorde jag för att få kunskap om grunderna i konceptet testning innan jag gick vidare till mina egna klasser.

Det jag fann mest utmanande med uppgiften var att testa exceptions och det blev en hel del fel innan jag fick rätt på det. Jag hade även problem med att installera Xdebug men hittade webbplatsen xdebug.org/wizard.php där man kan kopiera in informationen från ”-i phpinfo” och få information om hur man ska installera.

####Vilken är din TIL för detta kmom?
Min TIL för detta kursmoment är nyttan med enhetstester. Jag har som jag tidigare nämnde varit lite tveksam till att använda det men nu när jag vet mer om det så förstår jag hur användbart det är.


<a name="kmom04"></a><h2>Kursmoment 04</h2>

####Vilka är dina tankar och funderingar kring trait och interface?
Jag har tidigare kommit i kontakt med interface genom andra programmeringsspråk så det var inget jag hade några problem med. Trait var däremot helt nytt för mig, vad jag kan minnas i alla fall. Det var lite svårare att greppa konceptet trait och varför och när man ska använda det men det klarnar nog när jag finner mig i en situation där det passar att använda.

####Hur gick det att skapa intelligensen och taktiken till tärningsspelet, hur gjorde du?
Det gick bra även om det nog inte är den smartaste motståndaren man kan tänka sig. Datorn sparar när den har över 15 poäng en runda. När spelaren har över åttio poäng och datorn har under sextio poäng tar den större risker och sparar inte förrän den har kommit upp i 24 poäng per runda.
För att göra denna intelligens använder jag en if-sats som kontrollerar hur många poäng datorn har den aktuella rundan och hur många totalpoäng både spelare och dator har.

####Några reflektioner från att integrera hårdare in i ramverkets klasser och struktur?
Att integrera spelet mer i ramverket har både sina för och nackdelar. Jag tyckte att koden blev mer strukturerad när jag använde mig av ramverkets klasser men samtidigt så tycker jag att man förlorar en del flexibilitet när man blir låst till ramverket. Nu är det ju inte så lätt att lyfta ut spelet och lägga det på en annan webbplats med ett annat ramverk som det var innan mede de globala variablerna.
Arbetet med att integrera spelet gick smärtfritt när jag väl förstod hur klasserna fungerade.

####Berätta hur väl du lyckades med make test inuti ramverket och hur väl du lyckades att testa din kod med enhetstester och vilken kodtäckning du fick.
Jag är rätt nöjd med min make test. Jag fick totalt 86% täckning på lines och 85% på funktioner och metoder. Det var bara DiceLogic och trait som jag inte fick 100% på. Det är inte de mest djupgående testen jag gör utan jag testar mest så att rätt värden returneras och rätt antal värden i arrayer och utskrifter. Jag ser ingen skillnad på att utföra enhetstester i eller utanför ramverket.

####Vilken är din TIL för detta kmom?
Min TIL för detta kursmomentet är främst användandet av trait men jag har även fått en djupare förståelse för hur ramverket fungerarar.

####Övrigt
Jag gjorde ett försök på extrauppgifterna och snyggade till användargränssnittet för spelet lite. Jag la även till lite mer statistik men det sträcker sig bara till medelvärdet av det senaste slaget och medelvärdet av den totala poängen.



<a name="kmom05"></a><h2>Kursmoment 05</h2>

Här kommer snart redovisningstexten



<a name="kmom06"></a><h2>Kursmoment 06</h2>

Här kommer snart redovisningstexten



<a name="kmom10"></a><h2>Kursmoment 07-10</h2>

Här kommer snart redovisningstexten
