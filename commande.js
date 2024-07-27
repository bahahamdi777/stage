const gouvernorats = {
    "Tunis": [
      "Bab Bhar", "Bab Souika", "Cité El Khadra", "Djebel Jelloud", "El Kabaria",
      "El Menzah", "El Omrane", "El Omrane Supérieur", "El Ouardia", "Ettahrir",
      "Ezzouhour", "Hrairia", "La Goulette", "La Marsa", "Le Bardo",
      "Le Kram", "Médina", "Séjoumi", "Sidi El Béchir", "Sidi Hassine"
    ],
    "Ariana": [
      "Ariana Ville", "Ettadhamen", "Kalaat El Andalous", "Mnihla", "Raoued",
      "Sidi Thabet", "Soukra"
    ],
    "Ben Arous": [
      "Ben Arous", "Boumhel", "El Mourouj", "Ezzahra", "Fouchana",
      "Hammam Chott", "Hammam Lif", "M'Hamdia", "Médina Jedida", "Mégrine",
      "Mohamedia", "Radès"
    ],
    "Manouba": [
      "Borj El Amri", "Douar Hicher", "El Battan", "Jedaida", "Manouba",
      "Mornaguia", "Oued Ellil", "Tebourba"
    ],
    "Nabeul": [
      "Beni Khalled", "Beni Khiar", "Bou Argoub", "Dar Chaabane", "El Haouaria",
      "El Mida", "Grombalia", "Hammam Ghezaz", "Hammamet", "Kelibia",
      "Korba", "Menzel Bouzelfa", "Menzel Temime", "Nabeul", "Soliman", "Takelsa"
    ],
    "Zaghouan": [
      "Bir Mcherga", "El Fahs", "Nadhour", "Saouaf", "Zriba", "Zaghouan"
    ],
    "Bizerte": [
      "Bizerte Nord", "Bizerte Sud", "Djoumime", "El Alia", "Ghar El Melh",
      "Ghezala", "Joumine", "Mateur", "Menzel Bourguiba", "Menzel Jemil",
      "Ras Jebel", "Sejenane", "Tinja", "Utique", "Zarzouna"
    ],
    "Béja": [
      "Amdoun", "Beja Nord", "Beja Sud", "Goubellat", "Medjez El Bab",
      "Nefza", "Tebra", "Testour", "Thibar"
    ],
    "Jendouba": [
      "Ain Draham", "Balta Bou Aouane", "Bou Salem", "Fernana", "Ghardimaou",
      "Jendouba", "Jendouba Nord", "Oued Mliz", "Tabarka"
    ],
    "Kef": [
      "Dahmani", "El Ksour", "Jerissa", "Kalaat Khasba", "Kalaat Senan",
      "Kef Est", "Kef Ouest", "Nebeur", "Sakiet Sidi Youssef", "Tajerouine"
    ],
    "Siliana": [
      "Bargou", "Bou Arada", "El Aroussa", "Gaafour", "Kesra", "Makthar",
      "Rouhia", "Siliana Nord", "Siliana Sud"
    ],
    "Kairouan": [
      "Bou Hajla", "Chebika", "Chrarda", "Haffouz", "Hajeb El Ayoun",
      "Kairouan Nord", "Kairouan Sud", "Nasrallah", "Oueslatia", "Sbikha"
    ],
    "Kasserine": [
      "El Ayoun", "Ezzouhour", "Feriana", "Foussana", "Haidra", "Hassi El Ferid",
      "Jedelienne", "Kasserine Nord", "Kasserine Sud", "Majel Bel Abbes",
      "Sbeitla", "Sbeïtla", "Sbiba", "Thala"
    ],
    "Sidi Bouzid": [
      "Bir El Hafey", "Cebbala Ouled Asker", "Jelma", "Mazzouna", "Meknassy",
      "Menzel Bouzaiane", "Ouled Haffouz", "Regueb", "Sidi Ali Ben Aoun",
      "Sidi Bouzid Est", "Sidi Bouzid Ouest", "Souk Jedid"
    ],
    "Sousse": [
      "Akouda", "Bouficha", "Enfidha", "Hammam Sousse", "Hergla", "Kalâa Kebira",
      "Kalâa Seghira", "Kondar", "Msaken", "Sidi Bou Ali", "Sidi El Hani",
      "Sousse Jawhara", "Sousse Médina", "Sousse Riadh", "Sousse Sidi Abdelhamid"
    ],
    "Monastir": [
      "Bekalta", "Bembla", "Beni Hassen", "Jemmal", "Ksar Hellal", "Ksibet el Mediouni",
      "Menzel Ennour", "Menzel Fersi", "Moknine", "Monastir", "Sayada-Lamta-Bou Hjar",
      "Sahline", "Teboulba", "Zeramdine"
    ],
    "Mahdia": [
      "Bou Merdes", "Chorbane", "El Jem", "Essouassi", "Hebira",
      "Ksour Essef", "Mahdia", "Melloulèche", "Ouled Chamekh", "Sidi Alouane"
    ],
    "Sfax": [
      "Agareb", "Bir Ali Ben Khalifa", "El Amra", "El Hencha", "Graiba",
      "Jebeniana", "Kerkennah", "Mahrès", "Menzel Chaker", "Sakiet Eddaier",
      "Sakiet Ezzit", "Sfax Médina", "Sfax Ouest", "Sfax Sud", "Skhira"
    ],
    "Gabès": [
      "Gabès Médina", "Gabès Ouest", "Gabès Sud", "Ghannouch", "El Hamma",
      "Matmata", "Mareth", "Menzel Habib", "Métouia", "Nouvelle Matmata"
    ],
    "Médenine": [
      "Ben Gardane", "Beni Khedache", "Djerba - Ajim", "Djerba - Houmt Souk", "Djerba - Midoun",
      "Médenine Nord", "Médenine Sud", "Sidi Makhlouf", "Zarzis"
    ],
    "Tataouine": [
      "Bir Lahmar", "Dehiba", "Ghomrassen", "Remada", "Smar", "Tataouine Nord",
      "Tataouine Sud"
    ],
    "Gafsa": [
      "Belkhir", "El Guettar", "Gafsa Nord", "Gafsa Sud", "Mdhila", "Métlaoui",
      "Moularès", "Redeyef", "Sened", "Sidi Aïch"
    ],
    "Tozeur": [
      "Degache", "Hazoua", "Nefta", "Tameghza", "Tozeur"
    ],
    "Kebili": [
      "Douz Nord", "Douz Sud", "Faouar", "Kebili Nord", "Kebili Sud",
      "Souk Lahad"
    ]
  };
  
  document.addEventListener('DOMContentLoaded', function() {
    const stateSelect = document.getElementById('stateid');
    const delegationSelect = document.getElementById('delegationid');
  
    stateSelect.addEventListener('change', function() {
      const selectedGouvernorat = this.value;
  
      // Vider les options actuelles
      delegationSelect.innerHTML = '<option selected disabled>Choisissez...</option>';
  
      // Ajouter les nouvelles options
      if (gouvernorats[selectedGouvernorat]) {
        gouvernorats[selectedGouvernorat].forEach(function(delegation) {
          const option = document.createElement('option');
          option.value = delegation;
          option.textContent = delegation;
          delegationSelect.appendChild(option);
        });
      }
    });
  });
  