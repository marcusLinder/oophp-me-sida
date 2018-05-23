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

####Några reflektioner kring koden i övningen för PHP PDO och MySQL?
Både PHP PDO och MYSQL har ju använts i tidigare kurser så det var inga problem med att använda det. Jag tycker att koden var tydlig och bra förklarad. Det var intressant att lära sig använda paginering och sortering, något som känns viktigt vid långa listor. När jag tidigare försökt lösa sortering har det blivit ganska rörig kod men nu har jag lärt mig att göra det bättre och effektivare.

####Hur gick det att överföra koden in i ramverket, stötte du på några utmaningar?
Tack vare filmerna så var det inga problem att föra över koden till ramverket. Jag valde att ha SQL-satsen direkt i routern istället för att dela upp den i en klass. Detta för att jag tycker det blir lättare att få en översyn över hur koden hänger ihop och för att det inte blev allt för mycket extra kod att ha SQL-frågan direkt i routen.

####Berätta om din slutprodukt för filmdatabasen, gjorde du endast basfunktionaliteten eller lade du till extra features och hur tänkte du till kring användarvänligheten och din kodstruktur?
Utöver basfunktionaliteten la jag till paginering och sortering. Jag tycker att de är viktiga delar att ha med om databasen och tabellen skulle växa sig större. Pagineringen och sorteringen finns på filmdatabasens startsida medan listan som presenteras när man söker efter årtal och titel saknar dessa funktioner.

Jag använder även Cimage för att visa bilderna. Jag försökte få till en inloggningsfunktion för sidorna ”lägg till ny film”, ”uppdatera film” och ”ta bort film” men fick inte riktigt ordning på det och kände att det tog för lång tid.

Jag är nöjd med hur användargränssnittet blev och tycker att jag fick till den bra användarvänlighet.

####Vilken är din TIL för detta kmom?
Min TIL för detta kursmoment är att integrerar ramverket och en databas vilket känns som en viktig del av kursen. Jag har även lärt mig mer om de inbyggda klasserna i Anax. Det jag främst tar med mig och lärt mig av uppgiften är att smidigt sortera tabeller.


<a name="kmom06"></a><h2>Kursmoment 06</h2>

####Hur gick det att jobba med klassen för filtrering och formatting av texten?
Jag gick bra att jobba med klassen för textformatering. Utöver filter för bbcode, link, markdown och nl2br så gjorde jag extrauppgifterna och la till filter för strip_tag och htmlentitites. Jag har en test route som visar hur innehållet formateras, dels genom att läsa in textfilerna och genom text som är skriven direkt i routen. Jag är nöjd med hur strukturen för uppgiften blev och routefilen innehåller inte så mycket kod.

Jag tycker att det var en väldigt bra övning och klassen blev enkel men samtidigt väldigt användbar och kraftfull och sparar mycket tid. Jag hade lite problem med namespace eftersom Anax\Textfilter slutade fungera när jag döpte min egen mapp till textfilter. Därför har mitt textfilter namespace ”Mals17\Filter”.

####Berätta om din klasstruktur och kodstruktur för din lösning av webbsidor med innehåll i databasen.
Koden och SQL-satserna för uppgiften ligger direkt i routefilen vilket gör att den blir rätt rörig. Den enda klassen för uppgiften är textfiltret. Jag hade planer på att bryta ut sql-koden och ha den i en klass för sig som anropas av routefilen. Jag fastnade dock på lite andra delar i uppgiften vilket gjorde att tiden inte räckte till så det får vänta till projektet. Uppgiften består av ganska många vyer men jag tycker att alla är nödvändiga och kan inte se hur jag skulle kunna korta ned antalet eller göra dem på något annat sätt.

####Hur känner du rent allmänt för den koden du skrivit i din me/redovisa, vad är bra och mindre bra? Ser du potential till refactoring av din kod och/eller behov av stöd från ramverket?   
Överlag är jag ganska nöjd med koden jag har skrivit för kursmoment 1-6. Det som är mindre bra och jag är minst nöjd med är att routefilerna för filmerna och kmom06 är väldigt långa och innehåller kod som jag anser kan ligga i en separat klass. Strukturerna för tärningsspelet och gissa är jag nöjd med och målet för projektet är att dela upp koden för de delar som använder databas på ett lika smidigt sätt. Där finns potential till refactoring. Det jag är mest nöjd med är att ju längre in i kusen jag har kommit desto mindre kod finns det i vyerna.

####Vilken är din TIL för detta kmom?
Min TIL för detta kursmoment är framförallt textformatering och att det kan göras så smidigt så det gjorde i uppgiften. Jag har även fått en djupare förståelse för att integrera ramverket med en databas.

####Övrigt
Utöver de grundläggande kraven i uppgiften ”bygg webbsidor från innehåll i databasen” så gjorde jag några av extrauppgifterna. I översikten av bloggposterna visas bara en kortare inledning med en länk ”läs mer..” som leder till hela inlägget. Jag la även in paginering och sortering på administratörssidan.

Det jag är mest nöjd med är att jag fick en inloggning att fungera. Användaren kan logga in med doe/doe eller admin/admin och få tillgång till administratörssidan och skapa, uppdatera och ta bort innehåll. En icke inloggad användare kan bara se översikten av bloggar och sidor samt respektive post och page.



<a name="kmom10"></a><h2>Kursmoment 07-10</h2>

####Krav

#####Krav 1: Webbplats som demo
Jag valde att utforma projektet med fokus på att marknadsföra ett fiktivt företag, ”SportIT” som säljer produkter inom sport och fritid. Hem sidan presenterar företaget och webbplatsens syfte. Här finns även annan information som presenteras närmare i krav fyra.
Produktsidan är utformad som en traditionell eshop med namn, bild och pris för varje produkt. Klickar men på en produkt så kommer man vidare till produktens sida där mer utförlig information om produkten presenteras. Både från eshopen och produktsidan kan man välja att se alla produkter i en tabell med sortering och paginering. Vilket gör det lättare att hitta om man söker efter något speciellt. Från tabellen kan man gå till produktsidan genom att klicka på produktens namn.

I bloggen presenteras alla inlägg på en sida sorterade efter senaste inlägget först. Istället för att visa hela inlägget så visas bara titel, publiceringsdatum och en kort del av innehållet följt av en ”läs mer” länk. När man klickar på länken kommer man till hela blogginlägget där hela texten finns, en bild och vem författaren är.

Om-sidan har en enkel utformning och presenterar information om SportIT, webbplatsens syfte och teknik och lite kort om mig själv. Headern är gemensam för alla webbplatsens sidor och innehåller titel, slogan och en logga som föreställer flera olika bollar som används inom idrott, en bild som även används som favicon. Även footern är gemensam för alla sidor och innehåller text om Copyright och kontaktuppgifter.

Navbaren länkar till webbplatsens olika delar och ändras beroende på sessioner. Är man inte inloggad visas ”hem”, ”produkter, ”blogg”, ”om”, ”registrera kontot” och ”logga in”. Är man inloggad som användare så visas inte ”registrera” och ”logga in” utan istället visas länkar till ”Min profil”, ”tävling” och en knapp för att logga ut. Är man inloggad som administratör visas en länk till admin gränssnittet i navbaren. Administratörs gränssnittet har en egen navbar för sina funktioner.
Designen på webbplatsen är ganska enkel. Det är många ljusa och vita partier som bryts av av en brun nyans i header och footer. Alla knappar och länkar på webbplatsen har samma design för att skapa en enhetlighet. Även alla tabeller har samma färger och stil. För att underlätta för användaren och skapa ett mer tilltalande gränssnitt används fontawesome ikoner på nästan alla knappar.

#####Krav 2: Ordning och reda
Webbplatsen driftas på studentservern och databaskoden är uppdelad i filerna sql/setup.sql, sql/ddl.sql och sql/insert.sql. Databasen består av sex tabeller:  ”products” som lagrar information om produkterna, ”users” som lagrar information om användare, ”contentSportIT” som lagrar information om blogginläggen samt ”sportadmin” som lagrar administratörernas användarnamn och lösenord. Utöver dessa tabeller finns en tabell ”bonusCode” som lagrar bonuskoder som används i tärningsspelet (punkt  6) och tabellen ”bonusProduct” där en produkt kopplas samman med en bonuskod. ER-diagrammet automatgenererades i MySQL Workbench.

Det går att göra make test. Min ambitionsnivå för kodtäckningen var att i alla fall få upp staplarna för total till gul, det lyckades jag med och har 37,23% kodtäckning på total lines och 35,82% på total functions and methods. De klasserna jag lyckades bäst med var klasserna i dice och textfiltret som har 84,21% respektive 85,71% kodtäckning på funktioner och metoder. Jag gjorde ett försök på att testa klasser som är beroende av databasen men lyckades inte. Den låga kodtäckningen beror på att flera av mina funktioner är beroende av databasen.

Det går att generera dokumentation via kommandot make doc och jag hade inga problem med att få det att fungera. Jag har delat upp vyerna i mappar för att få en tydlig struktur, vyerna för administratörs gränssnittet ligger i mappen admin, för användare i users och så vidare.

#####Krav 3: Administrativt gränssnitt
Webbsidans administrations del skyddas av inloggning och man kan logga in med lösenorden och användarnamnen Admin/admin och doe/doe. För att logga in som administratör klickar man på knappen ”logga in som administratör” under ”Logga in. Försöker man besöka admin sidorna utan att vara inloggad som administratör så hamnar man på inloggningssidan. När man är inloggad möts man av en dashboard med information om vad man kan göra i administrations gränssnittet och information om produkter, poster och användare. Det finns en egen navbar för administrationsdelen.

I administratörsgränssnittet kan man lägga till, ta bort och uppdatera produkter och blogginlägg. Dessa funktioner når man dels genom navbaren och dels genom tabeller där alla produkter och inlägg visas. Tabellerna går även att sortera. Jag har valt att ge contentSportIT tabellen stöd för att skapa både posts och pages. Sidan hanterar bara posts så därför är valet ”post” förvalt i en dropdown meny när man skapar och uppdaterar ett inlägg. Anledningen till att man kan välja både post och page är att jag ville ha systemet förberett för att kunna hantera pages.

Från administratörs gränssnittet kan man även hantera användare. Användarna presenteras i en tabell som går att sortera. Och administratören kan byta lösenord och ta bort kontot.

Istället för att ta bort produkter, inlägg och användare helt från databasen sätts värdet ”deleted” till datumet när det blev borttaget. Detta för att det lätt ska gå att göra ändringar. Från update vyerna för produkter, inlägg och användare kan administratören sedan aktivera dem igen genom att ta bort ”deleted” i en div som dyker upp om det finns ett värde i ”deleted”. Informationen som skrivs om produkterna skrivs i markdown medan man kan välja filter för inläggen.

#####Krav 4: Förstasidan (optionell)
Jag la extra kraft på förstasidan för att göra den tilltalande. Även om färgschemat i stort sett är det samma som på övriga sidor så känns denna sidan mer stylad. De tre senaste inläggen från bloggen presenteras med en ”läs mer” länk till hela inlägget. Blogginläggen är inramade och har en bakgrundsbild föreställande sidans logga och en ljusgrå bakgrundsfärg med opacity för att det fortfarande ska gå lätt att läsa texten. Förstasidan inleds med lite information om SportIT och webbplatsen. Detta stycke har en annan font och större avstånd mellan raderna för att sticka ut mer och vara behagligt att läsa.

Längst ner på förstasidan finns en meny med tre rutor. En för den senast tillagda produkten som länkar till produkten, en för rekommenderade produkter som styrs av administratören genom att höja eller sänka ”rating” på produkten i administratörs gränssnittet. Den produkten med högst rating visas som rekommenderad på förstasidan. I menyn finns det även en länk till tävlingen tärningsspelet som man måste vara inloggad för att spela.

#####Krav 5: Registrera nytt konto (optionell)
Användare har möjligt att registrera ett konto och sedan logga in på webbplatsen. Registreringssidan finns tillgänglig både genom huvudmenyn och en länk på inloggningssidan. Under registreringen kollad det med databasen om användarnamnet är ledigt, annars visas ett felmeddelande. Användaren måste även ange lösenordet två gånger för att hen inte ska skriva fel första gången.

När användaren loggar in så redirectas hen till sin profilsida ”Min profil”. Här presenteras användarens information tillsammans med lite information. På profilsidan visas en profilbild som hämtas från gravatar via användarens epost-adress.

Från profilsidan kan användaren klicka på ”uppdatera profil” och välja att uppdatera sin profilinformation och skriva en kortare beskrivning av sig själv i markdown som sedan visas på profilsidan. På updatesidan kan användaren även byta lösenord genom att skriva in sitt befintliga och det nya lösenordet två gånger. I databasen ligger en testanvändare med användarnamnet ”Mackan” och lösenordet ”password”.

#####Krav 6: Spel för extra uppmärksamhet (optionell)
Jag kopierade inte tärningsspelet från tidigare uppgifter och tog bort de delar som jag inte tyckte passade in eller jag hade behov för i projektet. De delar som togs bort var bland annat histogramet och statistik. Jag ändrade även designen på gränssnittet för att det skulle passa till övriga sidors design.

När en användare vinner spelet så visas en div med en bonuskod som hämtas från databasen. Spelaren kan välja att spara koden och den lagras då i databasen kopplad till användaren. När en användare som har en sparad bonuskod besöker sin profilsida visas en ny div med information och alternativ att lämna in bonuskoden. När användaren lämnar in koden redirectas man till en bonussida som presenterar den produkt som är kopplad till bonuskoden och koden raderas från usertabellen i databasen.

####Genomförande
Jag tycker att arbetet med projektet har gått bra. När jag började med projektet hade jag en klar bild över vad jag ville uppnå och jag är nöjd med slutresultatet. Något jag är extra nöjd med var att jag bröt ut SQL-frågorna från routerna och la dem i en klass för sig själv. Något jag försökt göra i tidigare kursmoment men inte riktigt fått till. Tack vare att dem är i en separat klass kan jag återanvända satserna i flera olika router och routerna kortare och mer lättlästa.

Något som jag fick lägga ner en hel del tid på var att få ordning på sessionerna. Av någon anledning lyckas jag alltid röra till det när det gäller sessioner och det tog ett tag innan jag kom in i ramverkets sätt att arbeta med sessioner. Jag la även ner en del tid på att kryptera lösenorden med password_hash något jag inte känner igen att jag använt tidigare men när jag förstod konceptet så var det lätt att använda.

Det finns en del som kan förbättras i koden för att göra den smidigare, till exempel ha kontrollen om man är inloggad eller inte och redirecten i en funktion eller klass för sig själv. Som det ser ut nu körs kontrollen och redirecten i varje route där man måste vara inloggad. Genom att ha det i en annan klass kortar man ned routerna och gör koden tydligare. Men jag lyckades inte få det att fungera.
Jag tycker att projektet har varit rimligt för kursen och tagit upp allt det vi lärt oss i tidigare kursmoment.

####Om kursen
Jag är nöjd med kursen och tycker att den överlag har varit mycket bra. Som vanligt i dbwebb kurserna har materialet på webbplatsen, youtube filmerna och lärarnas tips och råd varit mycket bra och användbara. När det gäller den här kursen så känns det som att kursmomenten är lite ojämnt stora. Några av kursmomenten har varit väldigt små medan andra har varit lite i största laget, till exempel i kmom04 Trait och Interface var det mycket nytt och en hel del arbete jämfört med kmom03 Enhetstestning som var väldigt litet.

Det här var sista kursen i kurspaketet och alla kurser har hållit en väldigt hög nivå med intressant innehåll och kunniga och hjälpsamma lärare.

Jag kommer att rekommendera både kursen och kurspaketet till andra men kanske främst till folk som har tidigare erfarenhet av någon typ av programmering då det känns som man behöver lite om än små förkunskaper.

**Betyg: 8/10**
