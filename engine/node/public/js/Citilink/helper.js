
      if (SKYSALES.Util.createObject)
      {
      SKYSALES.Util.createObject('flightSearch', 'FlightSearch', 
      {
      "containerId": "flightSearchContainer",
      "flightTypeInputIdArray": 
      [
      {
      "flightTypeId": "AvailabilitySearchInputSearchView_RoundTrip",
      "hideInputIdArray": [
      "marketCityPair_2"
      ]
      },
      {
      "flightTypeId": "AvailabilitySearchInputSearchView_OneWay",
      "hideInputIdArray": [
      "marketCityPair_2",
      "marketDate_2"
      ]
      },
      {
      "flightTypeId": "AvailabilitySearchInputSearchView_OpenJaw",
      "hideInputIdArray": []
      }
      ]
    ,
      "countryInputIdArray": 
      [
      {
      "countryInputId": "AvailabilitySearchInputSearchView_DropDownListResidentCountry"
      }
      ]
    ,
      
      "marketArray": [
      
        {
        


        "validationObjectIdArray": 
          [
          {
          "key": "AvailabilitySearchInputSearchView_TextBoxMarketOrigin1",
          "value": "AvailabilitySearchInputSearchVieworiginStation1"
          },
          {
          "key": "AvailabilitySearchInputSearchView_TextBoxMarketDestination1",
          "value": "AvailabilitySearchInputSearchViewdestinationStation1"
          }
          ]
        ,
        "marketInputIdArray": 
          [
          {
          "originId": "AvailabilitySearchInputSearchVieworiginStation1",
          "destinationId": "AvailabilitySearchInputSearchViewdestinationStation1"
          },
          {
          "originId": "AvailabilitySearchInputSearchView_TextBoxMarketOrigin1",
          "destinationId": "AvailabilitySearchInputSearchView_TextBoxMarketDestination1"
          },
          {
          "originId": "AvailabilitySearchInputSearchView_DropDownListMarketOrigin1",
          "destinationId": "AvailabilitySearchInputSearchView_DropDownListMarketDestination1"
          }
          ]
        ,
        "stationInputIdArray": 
          [
          "AvailabilitySearchInputSearchView_TextBoxMarketOrigin1",
          "AvailabilitySearchInputSearchView_TextBoxMarketDestination1"
          ]
        ,
        "stationDropDownIdArray": 
          [
          {
          "inputId": "AvailabilitySearchInputSearchView_TextBoxMarketOrigin1",
          "selectBoxId": "AvailabilitySearchInputSearchVieworiginStation1"
          },
          {
          "inputId": "AvailabilitySearchInputSearchView_TextBoxMarketDestination1",
          "selectBoxId": "AvailabilitySearchInputSearchViewdestinationStation1"
          }
          ]
        ,
        "macInputIdArray": 
          [
          {
          "stationInputId": "AvailabilitySearchInputSearchView_TextBoxMarketOrigin1",
          "macContainerId": "originMac1",
          "macLabelId": "macOriginCodeList1",
          "macInputId": "AvailabilitySearchInputSearchView_CheckBoxUseMacOrigin1"
          },
          {
          "stationInputId": "AvailabilitySearchInputSearchView_TextBoxMarketDestination1",
          "macContainerId": "destinationMac1",
          "macLabelId": "macDestinationCodeList1",
          "macInputId": "AvailabilitySearchInputSearchView_CheckBoxUseMacDestination1"
          }
          ]
        ,
        "marketDateIdArray": 
          [
          {
          "marketDateId": "date_picker_id_1",
          "marketDayId": "AvailabilitySearchInputSearchView_DropDownListMarketDay1",
          "marketMonthYearId": "AvailabilitySearchInputSearchView_DropDownListMarketMonth1"
          }
          ]
        


        },
        {
        


        "validationObjectIdArray": 
          [
          {
          "key": "AvailabilitySearchInputSearchView_TextBoxMarketOrigin2",
          "value": "AvailabilitySearchInputSearchVieworiginStation2"
          },
          {
          "key": "AvailabilitySearchInputSearchView_TextBoxMarketDestination2",
          "value": "AvailabilitySearchInputSearchViewdestinationStation2"
          }
          ]
        ,
        "marketInputIdArray": 
          [
          {
          "originId": "AvailabilitySearchInputSearchVieworiginStation2",
          "destinationId": "AvailabilitySearchInputSearchViewdestinationStation2"
          },
          {
          "originId": "AvailabilitySearchInputSearchView_TextBoxMarketOrigin2",
          "destinationId": "AvailabilitySearchInputSearchView_TextBoxMarketDestination2"
          },
          {
          "originId": "AvailabilitySearchInputSearchView_DropDownListMarketOrigin2",
          "destinationId": "AvailabilitySearchInputSearchView_DropDownListMarketDestination2"
          }
          ]
        ,
        "stationInputIdArray": 
          [
          "AvailabilitySearchInputSearchView_TextBoxMarketOrigin2",
          "AvailabilitySearchInputSearchView_TextBoxMarketDestination2"
          ]
        ,
        "stationDropDownIdArray": 
          [
          {
          "inputId": "AvailabilitySearchInputSearchView_TextBoxMarketOrigin2",
          "selectBoxId": "AvailabilitySearchInputSearchVieworiginStation2"
          },
          {
          "inputId": "AvailabilitySearchInputSearchView_TextBoxMarketDestination2",
          "selectBoxId": "AvailabilitySearchInputSearchViewdestinationStation2"
          }
          ]
        ,
        "macInputIdArray": 
          [
          {
          "stationInputId": "AvailabilitySearchInputSearchView_TextBoxMarketOrigin2",
          "macContainerId": "originMac2",
          "macLabelId": "macOriginCodeList2",
          "macInputId": "AvailabilitySearchInputSearchView_CheckBoxUseMacOrigin2"
          },
          {
          "stationInputId": "AvailabilitySearchInputSearchView_TextBoxMarketDestination2",
          "macContainerId": "destinationMac2",
          "macLabelId": "macDestinationCodeList2",
          "macInputId": "AvailabilitySearchInputSearchView_CheckBoxUseMacDestination2"
          }
          ]
        ,
        "marketDateIdArray": 
          [
          {
          "marketDateId": "date_picker_id_2",
          "marketDayId": "AvailabilitySearchInputSearchView_DropDownListMarketDay2",
          "marketMonthYearId": "AvailabilitySearchInputSearchView_DropDownListMarketMonth2"
          }
          ]
        


        }
      ]

    
      }
    );
      }
    

            SKYSALES.Util.createObject("property","Property", { "propertyFieldHash": { "propertyAttributes": [ { },{ },{ },{ "id": "AvailabilitySearchInputSearchView_RoundTrip", "propertyHash": { "required": "true", "requirederror": "You must select Round Trip or One Way flight." } },{ },{ },{ "id": "AvailabilitySearchInputSearchView_DropDownListResidentCountry", "propertyHash": { "required": "true" } },{ },{ },{ },{ "id": "AvailabilitySearchInputSearchView_TextBoxMarketOrigin1", "propertyHash": { "required": "true", "requirederror": "Leaving From is a required field." } },{ "id": "AvailabilitySearchInputSearchView_TextBoxMarketDestination1", "propertyHash": { "required": "true", "requirederror": "Going To is a required field." } },{ },{ },{ },{ "id": "AvailabilitySearchInputSearchView_DropDownListMarketMonth1", "propertyHash": { "daterange": "true", "daterangeerror": "\nPlease make sure that your return date\nis not earlier than your outbound date.\n", "date1hiddenid": "date_picker_id_1", "date2hiddenid": "date_picker_id_2" } },{ },{ },{ },{ },{ },{ },{ "id": "AvailabilitySearchInputSearchView_DropDownListMarketMonth2", "propertyHash": { "daterange": "true", "daterangeerror": "\nPlease make sure that your return date\nis not earlier than your outbound date.\n", "date1hiddenid": "date_picker_id_1", "date2hiddenid": "date_picker_id_2" } },{ },{ },{ },{ },{ },{ } ] } });
        


      SKYSALES.Resource = new SKYSALES.Class.Resource();
      SKYSALES.Resource.init(
      {
      "carLocationInfo": 
            {}
          ,
      "activityLocationInfo": 
            {}
          ,
      "hotelLocationInfo": 
            {}
          ,
      "insuranceLocationInfo": 
            {}
          ,
      "stationInfo": {"StationList":[{"macCode":"","name":"Balikpapan","code":"BPN"},{"macCode":"","name":"Bandung","code":"BDO"},{"macCode":"","name":"Banjarmasin","code":"BDJ"},{"macCode":"","name":"Batam","code":"BTH"},{"macCode":"","name":"Bengkulu","code":"BKS"},{"macCode":"","name":"Changsha","code":"CSX"},{"macCode":"","name":"Denpasar Bali","code":"DPS"},{"macCode":"JKT","name":"Jakarta (Halim Perdana Kusuma)","code":"HLP"},{"macCode":"JKT","name":"Jakarta (Soekarno Hatta)","code":"CGK"},{"macCode":"","name":"Jambi","code":"DJB"},{"macCode":"","name":"Johor Bahru","code":"JHB"},{"macCode":"","name":"Kuala Lumpur","code":"KUL"},{"macCode":"","name":"Kuala Namu","code":"KNO"},{"macCode":"","name":"Kupang","code":"KOE"},{"macCode":"","name":"Lombok Praya","code":"LOP"},{"macCode":"","name":"Malang","code":"MLG"},{"macCode":"","name":"Manado","code":"MDC"},{"macCode":"","name":"Padang","code":"PDG"},{"macCode":"","name":"Palembang","code":"PLM"},{"macCode":"","name":"Pangkalpinang","code":"PGK"},{"macCode":"","name":"Pekanbaru","code":"PKU"},{"macCode":"","name":"Semarang","code":"SRG"},{"macCode":"","name":"Solo","code":"SOC"},{"macCode":"","name":"Surabaya","code":"SUB"},{"macCode":"","name":"Tanjung Pandan","code":"TJQ"},{"macCode":"","name":"Ujung Pandang","code":"UPG"},{"macCode":"","name":"Wuhan","code":"WUH"},{"macCode":"","name":"Yogjakarta","code":"JOG"}]},
      "countryInfo": {"CountryList":[{"name":"Andorra, Principality of","code":"AD"},{"name":"United Arab Emirates","code":"AE"},{"name":"Afghanistan","code":"AF"},{"name":"Antigua and Barbuda","code":"AG"},{"name":"Anguilla","code":"AI"},{"name":"Albania, People's Socialist Republic of","code":"AL"},{"name":"Armenia","code":"AM"},{"name":"Angola, Republic of","code":"AO"},{"name":"Argentina, Argentine Republic","code":"AR"},{"name":"American Samoa","code":"AS"},{"name":"Austria, Republic of","code":"AT"},{"name":"Australia, Commonwealth of","code":"AU"},{"name":"Aruba","code":"AW"},{"name":"Aland Islands","code":"AX"},{"name":"Azerbaijan, Republic of","code":"AZ"},{"name":"Bosnia and Herzegovina","code":"BA"},{"name":"Barbados","code":"BB"},{"name":"Bangladesh, People's Republic of","code":"BD"},{"name":"Belgium, Kingdom of","code":"BE"},{"name":"Burkina Faso","code":"BF"},{"name":"Bulgaria, People's Republic of","code":"BG"},{"name":"Bahrain, Kingdom of","code":"BH"},{"name":"Burundi, Republic of","code":"BI"},{"name":"Benin, People's Republic of","code":"BJ"},{"name":"Saint Barthelemy","code":"BL"},{"name":"Bermuda","code":"BM"},{"name":"Brunei Darussalam","code":"BN"},{"name":"Bolivia, Republic of","code":"BO"},{"name":"Bonaire, Saint Eustatius and Saba","code":"BQ"},{"name":"Brazil, Federative Republic of","code":"BR"},{"name":"Bahamas, Commonwealth of the","code":"BS"},{"name":"Bhutan, Kingdom of","code":"BT"},{"name":"Botswana, Republic of","code":"BW"},{"name":"Belarus","code":"BY"},{"name":"Belize","code":"BZ"},{"name":"Canada","code":"CA"},{"name":"Cocos (Keeling) Islands","code":"CC"},{"name":"Congo, Democratic Republic of","code":"CD"},{"name":"Central African Republic","code":"CF"},{"name":"Congo, People's Republic of","code":"CG"},{"name":"Switzerland, Swiss Confederation","code":"CH"},{"name":"Cote D'Ivoire, Ivory Coast, Republic of the","code":"CI"},{"name":"Cook Islands","code":"CK"},{"name":"Chile, Republic of","code":"CL"},{"name":"Cameroon, United Republic of","code":"CM"},{"name":"China, People's Republic of","code":"CN"},{"name":"Colombia, Republic of","code":"CO"},{"name":"Costa Rica, Republic of","code":"CR"},{"name":"Cuba, Republic of","code":"CU"},{"name":"Cape Verde, Republic of","code":"CV"},{"name":"Curacao","code":"CW"},{"name":"Christmas Island","code":"CX"},{"name":"Cyprus, Republic of","code":"CY"},{"name":"Czech Republic","code":"CZ"},{"name":"Germany","code":"DE"},{"name":"Djibouti, Republic of","code":"DJ"},{"name":"Denmark, Kingdom of","code":"DK"},{"name":"Dominica, Commonwealth of","code":"DM"},{"name":"Dominican Republic","code":"DO"},{"name":"Algeria, People's Democratic Republic of","code":"DZ"},{"name":"Ecuador, Republic of","code":"EC"},{"name":"Estonia","code":"EE"},{"name":"Egypt, Arab Republic of","code":"EG"},{"name":"Eritrea","code":"ER"},{"name":"Spain, Spanish State","code":"ES"},{"name":"Ethiopia","code":"ET"},{"name":"Finland, Republic of","code":"FI"},{"name":"Fiji, Republic of the Fiji Islands","code":"FJ"},{"name":"Falkland Islands (Malvinas)","code":"FK"},{"name":"Micronesia, Federated States of","code":"FM"},{"name":"Faeroe Islands","code":"FO"},{"name":"France, French Republic","code":"FR"},{"name":"Gabon, Gabonese Republic","code":"GA"},{"name":"United Kingdom of Great Britain & N. Ireland","code":"GB"},{"name":"Grenada","code":"GD"},{"name":"Georgia","code":"GE"},{"name":"French Guiana","code":"GF"},{"name":"Guernsey","code":"GG"},{"name":"Ghana, Republic of","code":"GH"},{"name":"Gibraltar","code":"GI"},{"name":"Greenland","code":"GL"},{"name":"Gambia, Republic of the","code":"GM"},{"name":"Guinea, Revolutionary People's Rep'c of","code":"GN"},{"name":"Guadeloupe","code":"GP"},{"name":"Equatorial Guinea, Republic of","code":"GQ"},{"name":"Greece, Hellenic Republic","code":"GR"},{"name":"Guatemala, Republic of","code":"GT"},{"name":"Guam","code":"GU"},{"name":"Guinea-Bissau, Republic of","code":"GW"},{"name":"Guyana, Republic of","code":"GY"},{"name":"Hong Kong, Special Administrative Region of China","code":"HK"},{"name":"Honduras, Republic of","code":"HN"},{"name":"Hrvatska (Croatia)","code":"HR"},{"name":"Haiti, Republic of","code":"HT"},{"name":"Hungary, Hungarian People's Republic","code":"HU"},{"name":"Indonesia, Republic of","code":"ID"},{"name":"Ireland","code":"IE"},{"name":"Israel, State of","code":"IL"},{"name":"Isle Of Man","code":"IM"},{"name":"India, Republic of","code":"IN"},{"name":"Iraq, Republic of","code":"IQ"},{"name":"Iran, Islamic Republic of","code":"IR"},{"name":"Iceland, Republic of","code":"IS"},{"name":"Italy, Italian Republic","code":"IT"},{"name":"Jersey","code":"JE"},{"name":"Jamaica","code":"JM"},{"name":"Jordan, Hashemite Kingdom of","code":"JO"},{"name":"Japan","code":"JP"},{"name":"Kenya, Republic of","code":"KE"},{"name":"Kyrgyz Republic","code":"KG"},{"name":"Cambodia, Kingdom of","code":"KH"},{"name":"Kiribati, Republic of","code":"KI"},{"name":"Comoros, Union of the","code":"KM"},{"name":"St. Kitts and Nevis","code":"KN"},{"name":"Korea, Democratic People's Republic of","code":"KP"},{"name":"Korea, Republic of","code":"KR"},{"name":"Kuwait, State of","code":"KW"},{"name":"Cayman Islands","code":"KY"},{"name":"Kazakhstan, Republic of","code":"KZ"},{"name":"Laos, People's Democratic Republic of","code":"LA"},{"name":"Lebanon, Lebanese Republic","code":"LB"},{"name":"St. Lucia","code":"LC"},{"name":"Liechtenstein, Principality of","code":"LI"},{"name":"Sri Lanka, Democratic Socialist Republic of","code":"LK"},{"name":"Liberia, Republic of","code":"LR"},{"name":"Lesotho, Kingdom of","code":"LS"},{"name":"Lithuania","code":"LT"},{"name":"Luxembourg, Grand Duchy of","code":"LU"},{"name":"Latvia","code":"LV"},{"name":"Libyan Arab Jamahiriya","code":"LY"},{"name":"Morocco, Kingdom of","code":"MA"},{"name":"Monaco, Principality of","code":"MC"},{"name":"Moldova, Republic of","code":"MD"},{"name":"Montenegro","code":"ME"},{"name":"Saint Martin","code":"MF"},{"name":"Madagascar, Republic of","code":"MG"},{"name":"Marshall Islands","code":"MH"},{"name":"Macedonia, the former Yugoslav Republic of","code":"MK"},{"name":"Mali, Republic of","code":"ML"},{"name":"Myanmar","code":"MM"},{"name":"Mongolia, Mongolian People's Republic","code":"MN"},{"name":"Macao, Special Administrative Region of China","code":"MO"},{"name":"Northern Mariana Islands","code":"MP"},{"name":"Martinique","code":"MQ"},{"name":"Mauritania, Islamic Republic of","code":"MR"},{"name":"Montserrat","code":"MS"},{"name":"Malta, Republic of","code":"MT"},{"name":"Mauritius","code":"MU"},{"name":"Maldives, Republic of","code":"MV"},{"name":"Malawi, Republic of","code":"MW"},{"name":"Mexico, United Mexican States","code":"MX"},{"name":"Malaysia","code":"MY"},{"name":"Mozambique, People's Republic of","code":"MZ"},{"name":"Namibia","code":"NA"},{"name":"New Caledonia","code":"NC"},{"name":"Niger, Republic of the","code":"NE"},{"name":"Norfolk Island","code":"NF"},{"name":"Nigeria, Federal Republic of","code":"NG"},{"name":"Nicaragua, Republic of","code":"NI"},{"name":"Netherlands, Kingdom of the","code":"NL"},{"name":"Norway, Kingdom of","code":"NO"},{"name":"Nepal, Kingdom of","code":"NP"},{"name":"Nauru, Republic of","code":"NR"},{"name":"Niue, Republic of","code":"NU"},{"name":"New Zealand","code":"NZ"},{"name":"Oman, Sultanate of","code":"OM"},{"name":"Panama, Republic of","code":"PA"},{"name":"Peru, Republic of","code":"PE"},{"name":"French Polynesia","code":"PF"},{"name":"Papua New Guinea","code":"PG"},{"name":"Philippines, Republic of the","code":"PH"},{"name":"Pakistan, Islamic Republic of","code":"PK"},{"name":"Poland, Polish People's Republic","code":"PL"},{"name":"St. Pierre and Miquelon","code":"PM"},{"name":"Puerto Rico","code":"PR"},{"name":"Palestinian Territory, Occupied","code":"PS"},{"name":"Portugal, Portuguese Republic","code":"PT"},{"name":"Palau","code":"PW"},{"name":"Paraguay, Republic of","code":"PY"},{"name":"Qatar, State of","code":"QA"},{"name":"Reunion","code":"RE"},{"name":"Romania, Socialist Republic of","code":"RO"},{"name":"Serbia","code":"RS"},{"name":"Russian Federation","code":"RU"},{"name":"Rwanda, Rwandese Republic","code":"RW"},{"name":"Saudi Arabia, Kingdom of","code":"SA"},{"name":"Solomon Islands","code":"SB"},{"name":"Seychelles, Republic of","code":"SC"},{"name":"Sudan, Democratic Republic of the","code":"SD"},{"name":"Sweden, Kingdom of","code":"SE"},{"name":"Singapore, Republic of","code":"SG"},{"name":"St. Helena","code":"SH"},{"name":"Slovenia","code":"SI"},{"name":"Svalbard & Jan Mayen Islands","code":"SJ"},{"name":"Slovakia (Slovak Republic)","code":"SK"},{"name":"Sierra Leone, Republic of","code":"SL"},{"name":"San Marino, Republic of","code":"SM"},{"name":"Senegal, Republic of","code":"SN"},{"name":"Somalia, Somali Republic","code":"SO"},{"name":"Suriname, Republic of","code":"SR"},{"name":"Sao Tome and Principe, Democratic Republic of","code":"ST"},{"name":"El Salvador, Republic of","code":"SV"},{"name":"Sint Maarten","code":"SX"},{"name":"Syrian Arab Republic","code":"SY"},{"name":"Swaziland, Kingdom of","code":"SZ"},{"name":"Turks and Caicos Islands","code":"TC"},{"name":"Chad, Republic of","code":"TD"},{"name":"Togo, Togolese Republic","code":"TG"},{"name":"Thailand, Kingdom of","code":"TH"},{"name":"Tajikistan","code":"TJ"},{"name":"Timor-Leste, Democratic Republic of","code":"TL"},{"name":"Turkmenistan","code":"TM"},{"name":"Tunisia, Republic of","code":"TN"},{"name":"Tonga, Kingdom of","code":"TO"},{"name":"Turkey, Republic of","code":"TR"},{"name":"Trinidad and Tobago, Republic of","code":"TT"},{"name":"Tuvalu","code":"TV"},{"name":"Taiwan, Province of China","code":"TW"},{"name":"Tanzania, United Republic of","code":"TZ"},{"name":"Ukraine","code":"UA"},{"name":"Uganda, Republic of","code":"UG"},{"name":"United States Minor Outlying Islands","code":"UM"},{"name":"United States of America","code":"US"},{"name":"Uruguay, Eastern Republic of","code":"UY"},{"name":"Uzbekistan","code":"UZ"},{"name":"St. Vincent and the Grenadines","code":"VC"},{"name":"Venezuela, Bolivarian Republic of","code":"VE"},{"name":"British Virgin Islands","code":"VG"},{"name":"US Virgin Islands","code":"VI"},{"name":"Vietnam","code":"VN"},{"name":"Vanuatu","code":"VU"},{"name":"Wallis and Futuna Islands","code":"WF"},{"name":"Samoa, Independent State of","code":"WS"},{"name":"Yemen","code":"YE"},{"name":"Mayotte","code":"YT"},{"name":"South Africa, Republic of","code":"ZA"},{"name":"Zambia, Republic of","code":"ZM"},{"name":"Zimbabwe","code":"ZW"}],"DefaultValue":""},
      "provinceStateInfo": {"ProvinceStateList":[{"scode":"BA","name":"BA","ccode":"AR"},{"scode":"CA","name":"CA","ccode":"AR"},{"scode":"CB","name":"CB","ccode":"AR"},{"scode":"CD","name":"CD","ccode":"AR"},{"scode":"CH","name":"CH","ccode":"AR"},{"scode":"CR","name":"CR","ccode":"AR"},{"scode":"ER","name":"ER","ccode":"AR"},{"scode":"FO","name":"FO","ccode":"AR"},{"scode":"LP","name":"LP","ccode":"AR"},{"scode":"LR","name":"LR","ccode":"AR"},{"scode":"MD","name":"MD","ccode":"AR"},{"scode":"MI","name":"MI","ccode":"AR"},{"scode":"NE","name":"NE","ccode":"AR"},{"scode":"PJ","name":"PJ","ccode":"AR"},{"scode":"RN","name":"RN","ccode":"AR"},{"scode":"SA","name":"SA","ccode":"AR"},{"scode":"SC","name":"SC","ccode":"AR"},{"scode":"SE","name":"SE","ccode":"AR"},{"scode":"SF","name":"SF","ccode":"AR"},{"scode":"SJ","name":"SJ","ccode":"AR"},{"scode":"SL","name":"SL","ccode":"AR"},{"scode":"TF","name":"TF","ccode":"AR"},{"scode":"TU","name":"TU","ccode":"AR"},{"scode":"AC","name":"AC","ccode":"AU"},{"scode":"NS","name":"NS","ccode":"AU"},{"scode":"NT","name":"NT","ccode":"AU"},{"scode":"QL","name":"QL","ccode":"AU"},{"scode":"SA","name":"SA","ccode":"AU"},{"scode":"TS","name":"TS","ccode":"AU"},{"scode":"VI","name":"VI","ccode":"AU"},{"scode":"WA","name":"WA","ccode":"AU"},{"scode":"AC","name":"AC","ccode":"BR"},{"scode":"AL","name":"AL","ccode":"BR"},{"scode":"AM","name":"AM","ccode":"BR"},{"scode":"AP","name":"AP","ccode":"BR"},{"scode":"BA","name":"BA","ccode":"BR"},{"scode":"CE","name":"CE","ccode":"BR"},{"scode":"DF","name":"DF","ccode":"BR"},{"scode":"ES","name":"ES","ccode":"BR"},{"scode":"FN","name":"FN","ccode":"BR"},{"scode":"GO","name":"GO","ccode":"BR"},{"scode":"MA","name":"MA","ccode":"BR"},{"scode":"MG","name":"MG","ccode":"BR"},{"scode":"MS","name":"MS","ccode":"BR"},{"scode":"MT","name":"MT","ccode":"BR"},{"scode":"PA","name":"PA","ccode":"BR"},{"scode":"PB","name":"PB","ccode":"BR"},{"scode":"PE","name":"PE","ccode":"BR"},{"scode":"PI","name":"PI","ccode":"BR"},{"scode":"PR","name":"PR","ccode":"BR"},{"scode":"RJ","name":"RJ","ccode":"BR"},{"scode":"RN","name":"RN","ccode":"BR"},{"scode":"RO","name":"RO","ccode":"BR"},{"scode":"RR","name":"RR","ccode":"BR"},{"scode":"RS","name":"RS","ccode":"BR"},{"scode":"SC","name":"SC","ccode":"BR"},{"scode":"SE","name":"SE","ccode":"BR"},{"scode":"SP","name":"SP","ccode":"BR"},{"scode":"TO","name":"TO","ccode":"BR"},{"scode":"AB","name":"AB","ccode":"CA"},{"scode":"BC","name":"BC","ccode":"CA"},{"scode":"MB","name":"MB","ccode":"CA"},{"scode":"NB","name":"NB","ccode":"CA"},{"scode":"NL","name":"NL","ccode":"CA"},{"scode":"NS","name":"NS","ccode":"CA"},{"scode":"NT","name":"NT","ccode":"CA"},{"scode":"NU","name":"NU","ccode":"CA"},{"scode":"ON","name":"ON","ccode":"CA"},{"scode":"PE","name":"PE","ccode":"CA"},{"scode":"QC","name":"QC","ccode":"CA"},{"scode":"SK","name":"SK","ccode":"CA"},{"scode":"YT","name":"YT","ccode":"CA"},{"scode":"CI","name":"CI","ccode":"ES"},{"scode":"SP","name":"SP","ccode":"ES"},{"scode":"EN","name":"EN","ccode":"GB"},{"scode":"IH","name":"IH","ccode":"GB"},{"scode":"NI","name":"NI","ccode":"GB"},{"scode":"SC","name":"SC","ccode":"GB"},{"scode":"SI","name":"SI","ccode":"GB"},{"scode":"WL","name":"WL","ccode":"GB"},{"scode":"A","name":"Maluku","ccode":"ID"},{"scode":"BB","name":"Bangka Belitung","ccode":"ID"},{"scode":"BK","name":"Bengkulu ","ccode":"ID"},{"scode":"BL","name":"Bali","ccode":"ID"},{"scode":"BT","name":"Banten","ccode":"ID"},{"scode":"GR","name":"Gorontalo","ccode":"ID"},{"scode":"JB","name":"Jawa Barat","ccode":"ID"},{"scode":"JG","name":"Jawa Tengah","ccode":"ID"},{"scode":"JI","name":"Jambi","ccode":"ID"},{"scode":"JK","name":"DKI Jakarta","ccode":"ID"},{"scode":"JT","name":"Jawa Timur","ccode":"ID"},{"scode":"KB","name":"Kalimantan Barat","ccode":"ID"},{"scode":"KG","name":"Kalimantan Tengah","ccode":"ID"},{"scode":"KR","name":"Kepulauan Riau","ccode":"ID"},{"scode":"KS","name":"Kalimantan Selatan","ccode":"ID"},{"scode":"KT","name":"Kalimantan Timur","ccode":"ID"},{"scode":"LP","name":"Lampung","ccode":"ID"},{"scode":"MU","name":"Maluku Utara","ccode":"ID"},{"scode":"NA","name":"Nanggro Aceh Darussalam","ccode":"ID"},{"scode":"NB","name":"Nusa Tenggara Barat","ccode":"ID"},{"scode":"NT","name":"Nusa Tenggara Timur","ccode":"ID"},{"scode":"PB","name":"Papua Barat","ccode":"ID"},{"scode":"PJ","name":"Papua","ccode":"ID"},{"scode":"RI","name":"Riau ","ccode":"ID"},{"scode":"SB","name":"Sumatera Barat ","ccode":"ID"},{"scode":"SK","name":"Sulawesi Barat","ccode":"ID"},{"scode":"SL","name":"Sulawesi Selatan","ccode":"ID"},{"scode":"SM","name":"Sulawesi Utara","ccode":"ID"},{"scode":"SP","name":"Sulawesi Tengah","ccode":"ID"},{"scode":"SS","name":"Sumatera Selatan","ccode":"ID"},{"scode":"ST","name":"Sulawesi Tenggara","ccode":"ID"},{"scode":"SU","name":"Sumatera Utara","ccode":"ID"},{"scode":"YK","name":"Daerah Istimewa Yogyakarta","ccode":"ID"},{"scode":"AK","name":"AK","ccode":"US"},{"scode":"AL","name":"AL","ccode":"US"},{"scode":"AR","name":"AR","ccode":"US"},{"scode":"AZ","name":"AZ","ccode":"US"},{"scode":"CA","name":"CA","ccode":"US"},{"scode":"CO","name":"CO","ccode":"US"},{"scode":"CT","name":"CT","ccode":"US"},{"scode":"DC","name":"DC","ccode":"US"},{"scode":"DE","name":"DE","ccode":"US"},{"scode":"FL","name":"FL","ccode":"US"},{"scode":"GA","name":"GA","ccode":"US"},{"scode":"HI","name":"HI","ccode":"US"},{"scode":"IA","name":"IA","ccode":"US"},{"scode":"ID","name":"ID","ccode":"US"},{"scode":"IL","name":"IL","ccode":"US"},{"scode":"IN","name":"IN","ccode":"US"},{"scode":"KS","name":"KS","ccode":"US"},{"scode":"KY","name":"KY","ccode":"US"},{"scode":"LA","name":"LA","ccode":"US"},{"scode":"MA","name":"MA","ccode":"US"},{"scode":"MD","name":"MD","ccode":"US"},{"scode":"ME","name":"ME","ccode":"US"},{"scode":"MI","name":"MI","ccode":"US"},{"scode":"MN","name":"MN","ccode":"US"},{"scode":"MO","name":"MO","ccode":"US"},{"scode":"MS","name":"MS","ccode":"US"},{"scode":"MT","name":"MT","ccode":"US"},{"scode":"NC","name":"NC","ccode":"US"},{"scode":"ND","name":"ND","ccode":"US"},{"scode":"NE","name":"NE","ccode":"US"},{"scode":"NH","name":"NH","ccode":"US"},{"scode":"NJ","name":"NJ","ccode":"US"},{"scode":"NM","name":"NM","ccode":"US"},{"scode":"NV","name":"NV","ccode":"US"},{"scode":"NY","name":"NY","ccode":"US"},{"scode":"OH","name":"OH","ccode":"US"},{"scode":"OK","name":"OK","ccode":"US"},{"scode":"OR","name":"OR","ccode":"US"},{"scode":"PA","name":"PA","ccode":"US"},{"scode":"RI","name":"RI","ccode":"US"},{"scode":"SC","name":"SC","ccode":"US"},{"scode":"SD","name":"SD","ccode":"US"},{"scode":"TN","name":"TN","ccode":"US"},{"scode":"TX","name":"TX","ccode":"US"},{"scode":"UT","name":"UT","ccode":"US"},{"scode":"VA","name":"VA","ccode":"US"},{"scode":"VT","name":"VT","ccode":"US"},{"scode":"WA","name":"WA","ccode":"US"},{"scode":"WI","name":"WI","ccode":"US"},{"scode":"WV","name":"WV","ccode":"US"},{"scode":"WY","name":"WY","ccode":"US"}]},
      "marketInfo": {"MarketList":{"BDJ":[{"code":"BKS"},{"code":"BTH"},{"code":"CGK"},{"code":"DJB"},{"code":"DPS"},{"code":"JOG"},{"code":"KNO"},{"code":"KOE"},{"code":"LOP"},{"code":"PDG"},{"code":"PGK"},{"code":"PKU"},{"code":"SUB"},{"code":"TJQ"}],"BKS":[{"code":"BDJ"},{"code":"BPN"},{"code":"CGK"},{"code":"DPS"},{"code":"JOG"},{"code":"MLG"},{"code":"SRG"},{"code":"SUB"},{"code":"UPG"}],"BTH":[{"code":"BDJ"},{"code":"BPN"},{"code":"CGK"},{"code":"DPS"},{"code":"JOG"},{"code":"KNO"},{"code":"KOE"},{"code":"LOP"},{"code":"MLG"},{"code":"PDG"},{"code":"PKU"},{"code":"PLM"},{"code":"SRG"},{"code":"SUB"},{"code":"TJQ"},{"code":"UPG"}],"CGK":[{"code":"BDJ"},{"code":"BKS"},{"code":"BPN"},{"code":"BTH"},{"code":"DJB"},{"code":"DPS"},{"code":"JOG"},{"code":"KNO"},{"code":"KOE"},{"code":"LOP"},{"code":"MLG"},{"code":"PDG"},{"code":"PGK"},{"code":"PKU"},{"code":"PLM"},{"code":"SRG"},{"code":"SUB"},{"code":"TJQ"},{"code":"UPG"}],"DJB":[{"code":"BDJ"},{"code":"BPN"},{"code":"CGK"},{"code":"DPS"},{"code":"JOG"},{"code":"MLG"},{"code":"PKU"},{"code":"SRG"},{"code":"SUB"},{"code":"TJQ"},{"code":"UPG"}],"DPS":[{"code":"BDJ"},{"code":"BDO"},{"code":"BKS"},{"code":"BPN"},{"code":"BTH"},{"code":"CGK"},{"code":"CSX"},{"code":"DJB"},{"code":"JOG"},{"code":"KNO"},{"code":"KOE"},{"code":"PDG"},{"code":"PGK"},{"code":"PKU"},{"code":"SUB"},{"code":"TJQ"},{"code":"WUH"}],"JOG":[{"code":"BDJ"},{"code":"BKS"},{"code":"BPN"},{"code":"BTH"},{"code":"CGK"},{"code":"DJB"},{"code":"DPS"},{"code":"HLP"},{"code":"KNO"},{"code":"PDG"},{"code":"PGK"},{"code":"PKU"},{"code":"PLM"},{"code":"TJQ"},{"code":"UPG"}],"KNO":[{"code":"BDJ"},{"code":"BDO"},{"code":"BPN"},{"code":"BTH"},{"code":"CGK"},{"code":"DPS"},{"code":"JOG"},{"code":"MLG"},{"code":"PLM"},{"code":"SRG"},{"code":"SUB"},{"code":"TJQ"},{"code":"UPG"}],"KOE":[{"code":"BDJ"},{"code":"BPN"},{"code":"BTH"},{"code":"CGK"},{"code":"DPS"},{"code":"LOP"},{"code":"SUB"}],"LOP":[{"code":"BDJ"},{"code":"BPN"},{"code":"BTH"},{"code":"CGK"},{"code":"KOE"},{"code":"SUB"},{"code":"TJQ"}],"PDG":[{"code":"BDJ"},{"code":"BPN"},{"code":"BTH"},{"code":"CGK"},{"code":"DPS"},{"code":"JOG"},{"code":"MLG"},{"code":"PLM"},{"code":"SRG"},{"code":"SUB"},{"code":"UPG"}],"PGK":[{"code":"BDJ"},{"code":"BPN"},{"code":"CGK"},{"code":"DPS"},{"code":"JOG"},{"code":"MLG"},{"code":"SRG"},{"code":"SUB"},{"code":"TJQ"},{"code":"UPG"}],"PKU":[{"code":"BDJ"},{"code":"BPN"},{"code":"BTH"},{"code":"CGK"},{"code":"DJB"},{"code":"DPS"},{"code":"JOG"},{"code":"MLG"},{"code":"PLM"},{"code":"SRG"},{"code":"SUB"},{"code":"UPG"}],"SUB":[{"code":"BDJ"},{"code":"BKS"},{"code":"BPN"},{"code":"BTH"},{"code":"CGK"},{"code":"DJB"},{"code":"DPS"},{"code":"HLP"},{"code":"JHB"},{"code":"KNO"},{"code":"KOE"},{"code":"KUL"},{"code":"LOP"},{"code":"MDC"},{"code":"PDG"},{"code":"PGK"},{"code":"PKU"},{"code":"PLM"},{"code":"TJQ"}],"TJQ":[{"code":"BDJ"},{"code":"BPN"},{"code":"BTH"},{"code":"CGK"},{"code":"DJB"},{"code":"DPS"},{"code":"JOG"},{"code":"KNO"},{"code":"LOP"},{"code":"MLG"},{"code":"PGK"},{"code":"SRG"},{"code":"SUB"},{"code":"UPG"}],"BDO":[{"code":"DPS"},{"code":"KNO"}],"BPN":[{"code":"BKS"},{"code":"BTH"},{"code":"CGK"},{"code":"DJB"},{"code":"DPS"},{"code":"HLP"},{"code":"JOG"},{"code":"KNO"},{"code":"KOE"},{"code":"LOP"},{"code":"PDG"},{"code":"PGK"},{"code":"PKU"},{"code":"SUB"},{"code":"TJQ"},{"code":"UPG"}],"MLG":[{"code":"BKS"},{"code":"BTH"},{"code":"CGK"},{"code":"DJB"},{"code":"HLP"},{"code":"KNO"},{"code":"PDG"},{"code":"PGK"},{"code":"PKU"},{"code":"TJQ"}],"SRG":[{"code":"BKS"},{"code":"BTH"},{"code":"CGK"},{"code":"DJB"},{"code":"HLP"},{"code":"KNO"},{"code":"PDG"},{"code":"PGK"},{"code":"PKU"},{"code":"TJQ"}],"UPG":[{"code":"BKS"},{"code":"BPN"},{"code":"BTH"},{"code":"CGK"},{"code":"DJB"},{"code":"JOG"},{"code":"KNO"},{"code":"PDG"},{"code":"PGK"},{"code":"PKU"},{"code":"TJQ"}],"HLP":[{"code":"BPN"},{"code":"JOG"},{"code":"MLG"},{"code":"PLM"},{"code":"SOC"},{"code":"SRG"},{"code":"SUB"}],"PLM":[{"code":"BTH"},{"code":"CGK"},{"code":"HLP"},{"code":"JOG"},{"code":"KNO"},{"code":"PDG"},{"code":"PKU"},{"code":"SUB"}],"CSX":[{"code":"DPS"}],"WUH":[{"code":"DPS"}],"SOC":[{"code":"HLP"}],"JHB":[{"code":"SUB"}],"KUL":[{"code":"SUB"}],"MDC":[{"code":"SUB"}]}},
      "macInfo": 
            {}
          ,
      "sourceInfo": 
            {}
          ,
      "dateCultureInfo": {"monthNames":["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember",""],"monthNamesShort":["Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agust","Sep","Okt","Nop","Des",""],"dayNames":["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"],"dayNamesShort":["Minggu","Sen","Sel","Rabu","Kamis","Jumat","Sabtu"],"dayNamesMin":["M","S","S","R","K","J","S"]},
      "currencyCultureInfo": {"symbol":"$","displayCode":"USD","decimalDigits":2,"decimalSeparator":",","groupSeparator":".","groupSizes":[3],"negativeSign":"-","negativePattern":"($n)","positivePattern":"$n","positivePatternWithDisplayCode":"$n USD","negativePatternWithDisplayCode":"($n) USD"},
      "carrierInfo": 
            {}
          ,
      "datePickerInfo": 
        {
        "datePickerFormat": "mdy",
        
            "datePickerDelimiter": "/",
            "datePickerDelimiter": "/",
          
        "closeText": "Tutup",
        "prevText": "Sebelumnya",
        "nextText": "Selanjutnya",
        "currentText": "Hari ini"
        }
      ,
      "passengerInfo": 
            {}
          ,
      "titleInfo": 
            {}
          ,
      "carrierInfo": 
            {}
          ,
      "carInfo": 
            {}
          ,
      "externalRateInfo": 
            {}
          ,
      "currencyInfo": 
            {}
          
      }
      );
    