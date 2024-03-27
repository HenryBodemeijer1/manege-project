@extends('layouts.app2')  <!-- Uitbreiding van het 'app2'-lay-out, dat de algehele structuur van de pagina biedt -->

@section('content')  <!-- Definitie van de 'content'-sectie, waar de hoofdinhoud van de pagina wordt geplaatst -->

<header class="mainHeading"> <!-- Dit is de kopsectie van de pagina -->
   <div class="content"> <!-- Dit is een container voor de kopinhoud -->
      <article class="text"> <!-- Dit is een artikel met tekstinhoud voor de kop -->
        <p class="preTitle">Manege</p> <!-- Dit is een pre-titel voor de kop -->
        <h2 class="title">Het edele ros</h2> <!-- Dit is de hoofdtitel van de pagina -->
        <p class="description">
            Het Edele Ros is een rijvereniging uit het Noord Brabantse dorp Haaren. Onze rijvereniging is opgericht op 6 januari 1931.
            29 jaar later, in 1960, werd er ook een ponyclub opgericht. <br><br>
            Het Edele Ros is een gezellige vereniging, waar iedereen van harte welkom is, van jong tot oud, van recreant tot wedstrijdruiter. 
        </p> <!-- Dit is een beschrijving van de pagina-inhoud -->
      </article>

      <figure class="location-image image"> <!-- Dit is een figuurelement voor een afbeelding die betrekking heeft op de inhoud -->
         <img
         class="img1"
            src="https://images.unsplash.com/photo-1514121999587-09c57bd4d8e7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80"
            alt=""
         />
      </figure>
   </div>
</header>

<div class="section2"> <!-- Dit is de tweede sectie van de pagina -->
    <div > <!-- Dit is een container voor het eerste deel van de tweede sectie -->
        <img class="img" 
            src="https://images.freeimages.com/images/large-previews/6d7/horse-trial-5-1548281.jpg"
            alt=""
        />
    </div>
    <div> <!-- Dit is een container voor het tweede deel van de tweede sectie -->
        <p> <!-- Dit is een alinea-element met tekstinhoud -->
            <h3>Accommodatie</h3><br> <!-- Dit is een subkop -->
                Onze rijvereniging beschikt over een grote binnen-rijbak van 20x60 meter, <br>
                met daarnaast ruimte om op- en af te zadelen. Ook beschikken <br>
                we over een zeer groot buitenterrein, waar we op het zand kunnen rijden of op gras. <br><br>

                Natuurlijk beschikken we ook over ruim voldoende en makkelijk <br>
                te bereiken parkeergelegenheid.<br><br>

                LET OP! De binnenbaan is 2 juni 2023 t/m 8 augustus 2023 niet bruikbaar <br>
                i.v.m. circusvoorstellingen. <br><br><br><br>
            <h3>Wedstrijden</h3><br> <!-- Dit is een andere subkop -->
                Ook Het Edele Ros organiseert regelmatig wedstrijden voor paarden en pony's. <br>
                Meestal aan het eind van het winterseizoen (eind maart) en aan <br>
                het eind van het zomerseizoen (eind september/begin oktober). <br><br>
                Het Edele Ros is aangesloten bij de KNHS en hoort bij Kring Hart van Brabant. <br>
        </p> <!-- Einde van de tekstinhoud in deze sectie -->
    </div>
</div>

@include("includes.footer")  <!-- Inclusief de 'footer'-sectie -->

@endsection  <!-- Einde van de 'content'-sectie -->
