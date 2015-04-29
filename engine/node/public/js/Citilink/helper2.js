
          //
            $(document).ready(function() {
                // Hard coded firefly station info and market info
                var fireflyResource = {
                    "stationInfo": {"StationList":[{"allowed":"False","cityCode":"ADL","countryCode":"AU","macCode":null,"name":"Adelaide Airport","shortName":"Adelaide Airport","code":"ADL"},{"allowed":"True","cityCode":"AOR","countryCode":"MY","macCode":null,"name":"Alor Setar","shortName":"Alor Setar Airport","code":"AOR"},{"allowed":"False","cityCode":"AMS","countryCode":"NL","macCode":null,"name":"Amsterdam-Schiphol Airport","shortName":"Amsterdam-Schiphol Airport","code":"AMS"},{"allowed":"True","cityCode":"BTJ","countryCode":"ID","macCode":null,"name":"Banda Aceh","shortName":"Blang Bintang Airport","code":"BTJ"},{"allowed":"False","cityCode":"BDO","countryCode":"ID","macCode":null,"name":"Bandung","shortName":"Husein Sastranegara Airport","code":"BDO"},{"allowed":"True","cityCode":"BTH","countryCode":"ID","macCode":null,"name":"Batam","shortName":"Hang Nadim Airport","code":"BTH"},{"allowed":"False","cityCode":"BTU","countryCode":"MY","macCode":null,"name":"Bintulu Airport","shortName":"Bintulu Airport","code":"BTU"},{"allowed":"False","cityCode":"TLS","countryCode":"FR","macCode":null,"name":"Blagnac Airport","shortName":"Blagnac Airport","code":"TLS"},{"allowed":"False","cityCode":"BNE","countryCode":"AU","macCode":null,"name":"Brisbane International Airport","shortName":"Brisbane International Airport","code":"BNE"},{"allowed":"False","cityCode":"BRS","countryCode":"GB","macCode":null,"name":"Bristol Airport","shortName":"Bristol Airport","code":"BRS"},{"allowed":"False","cityCode":"MAA","countryCode":"IN","macCode":null,"name":"Chennai Airport","shortName":"Chennai Airport","code":"MAA"},{"allowed":"False","cityCode":"CNX","countryCode":"TH","macCode":null,"name":"Chiang Mai International Airport","shortName":"Chiang Mai International Airport","code":"CNX"},{"allowed":"False","cityCode":"XCH","countryCode":"AU","macCode":null,"name":"Christmas Island","shortName":"Christmas Island Airport","code":"XCH"},{"allowed":"True","cityCode":"BKK","countryCode":"TH","macCode":null,"name":"Bangkok - Don Mueang","shortName":"Don Mueang Int'l Airport","code":"DMK"},{"allowed":"False","cityCode":"DXB","countryCode":"AE","macCode":null,"name":"Dubai Airport","shortName":"Dubai Airport","code":"DXB"},{"allowed":"False","cityCode":"EPI","countryCode":"VU","macCode":null,"name":"Epi Airport","shortName":"Epi Airport","code":"EPI"},{"allowed":"False","cityCode":"FRA","countryCode":"DE","macCode":null,"name":"Frankfurt International Airport","shortName":"Frankfurt International Airport","code":"FRA"},{"allowed":"False","cityCode":"HAK","countryCode":"CN","macCode":null,"name":"Haikou","shortName":"Haikou Airport","code":"HAK"},{"allowed":"False","cityCode":"LON","countryCode":"GB","macCode":null,"name":"Heathrow Airport","shortName":"Heathrow Airport","code":"LHR"},{"allowed":"False","cityCode":"HKG","countryCode":"HK","macCode":null,"name":"Hong Kong","shortName":"Hong Kong International Airport","code":"HKG"},{"allowed":"False","cityCode":"SEL","countryCode":"KR","macCode":null,"name":"Incheon International Airport","shortName":"Incheon International Airport","code":"ICN"},{"allowed":"True","cityCode":"IPH","countryCode":"MY","macCode":null,"name":"Ipoh","shortName":"Ipoh Airport","code":"IPH"},{"allowed":"False","cityCode":"JKT","countryCode":"ID","macCode":null,"name":"Jakarta","shortName":"Soekarno-Hatta International Air","code":"CGK"},{"allowed":"True","cityCode":"JHB","countryCode":"MY","macCode":null,"name":"Johor Bahru","shortName":"Sultan Ismail International Airp","code":"JHB"},{"allowed":"False","cityCode":"OSA","countryCode":"JP","macCode":null,"name":"Kansai International Airport","shortName":"Kansai International Airport","code":"KIX"},{"allowed":"True","cityCode":"KTE","countryCode":"MY","macCode":null,"name":"Kerteh","shortName":"Kerteh Airport","code":"KTE"},{"allowed":"False","cityCode":"SYD","countryCode":"AU","macCode":null,"name":"Sydney","shortName":"Kingsford Smith Airport","code":"SYD"},{"allowed":"True","cityCode":"USM","countryCode":"TH","macCode":null,"name":"Koh Samui","shortName":"Koh Samui Airport","code":"USM"},{"allowed":"True","cityCode":"KBR","countryCode":"MY","macCode":null,"name":"Kota Bharu","shortName":"Pengkalan Chepa Airport","code":"KBR"},{"allowed":"False","cityCode":"BKI","countryCode":"MY","macCode":null,"name":"Kota Kinabalu","shortName":"Kota Kinabalu Airport","code":"BKI"},{"allowed":"False","cityCode":"KUL","countryCode":"MY","macCode":null,"name":"Kuala Lumpur(KLIA)","shortName":"Kuala Lumpur International Airpo","code":"KUL"},{"allowed":"True","cityCode":"TGG","countryCode":"MY","macCode":null,"name":"Kuala Terengganu","shortName":"Sultan Mahmud Airport","code":"TGG"},{"allowed":"True","cityCode":"KUA","countryCode":"MY","macCode":null,"name":"Kuantan","shortName":"Kuantan Airport","code":"KUA"},{"allowed":"True","cityCode":"KBV","countryCode":"TH","macCode":null,"name":"Krabi Airport","shortName":"Krabi Airport","code":"KBV"},{"allowed":"False","cityCode":"KCH","countryCode":"MY","macCode":null,"name":"Kuching","shortName":"Kuching Airport","code":"KCH"},{"allowed":"True","cityCode":"LGK","countryCode":"MY","macCode":null,"name":"Langkawi","shortName":"Langkawi Airport","code":"LGK"},{"allowed":"False","cityCode":"LAX","countryCode":"US","macCode":null,"name":"Los Angeles","shortName":"Los Angeles International Airpor","code":"LAX"},{"allowed":"True","cityCode":"MKZ","countryCode":"MY","macCode":null,"name":"Malacca","shortName":"Batu Berendam Airport","code":"MKZ"},{"allowed":"False","cityCode":"MES","countryCode":"ID","macCode":null,"name":"Medan","shortName":"Polania Airport","code":"MES"},{"allowed":"True","cityCode":"MES","countryCode":"ID","macCode":null,"name":"Medan Kuala Namu","shortName":"Kuala Namu International Airport","code":"KNO"},{"allowed":"False","cityCode":"SZB","countryCode":"MY","macCode":null,"name":"Migrated from OpenSkies","shortName":"Migrated from OpenSkies","code":"ZZZ"},{"allowed":"False","cityCode":"MYY","countryCode":"MY","macCode":null,"name":"Miri","shortName":"Miri Airport","code":"MYY"},{"allowed":"False","cityCode":"BOM","countryCode":"IN","macCode":null,"name":"Mumbai Airport","shortName":"Mumbai Airport","code":"BOM"},{"allowed":"False","cityCode":"NNG","countryCode":"CN","macCode":null,"name":"Nanning","shortName":"Nanning Airport","code":"NNG"},{"allowed":"False","cityCode":"TYO","countryCode":"JP","macCode":null,"name":"Narita Airport","shortName":"Narita Airport","code":"NRT"},{"allowed":"True","cityCode":"PKU","countryCode":"ID","macCode":null,"name":"Pekan Baru","shortName":"Simpang Tiga Airport","code":"PKU"},{"allowed":"True","cityCode":"PEN","countryCode":"MY","macCode":null,"name":"Penang","shortName":"Penang International Airport","code":"PEN"},{"allowed":"True","cityCode":"HKT","countryCode":"TH","macCode":null,"name":"Phuket","shortName":"Phuket International Airport","code":"HKT"},{"allowed":"False","cityCode":"PDX","countryCode":"US","macCode":null,"name":"Portland International Airport","shortName":"Portland International Airport","code":"PDX"},{"allowed":"False","cityCode":"SHA","countryCode":"CN","macCode":null,"name":"PuDong Airport","shortName":"PuDong Airport","code":"PVG"},{"allowed":"False","cityCode":"SDK","countryCode":"MY","macCode":null,"name":"Sandakan","shortName":"Sandakan Airport","code":"SDK"},{"allowed":"False","cityCode":"SBW","countryCode":"MY","macCode":null,"name":"Sibu","shortName":"Sibu Airport","code":"SBW"},{"allowed":"True","cityCode":"SIN","countryCode":"SG","macCode":null,"name":"Singapore","shortName":"Changi Airport","code":"SIN"},{"allowed":"True","cityCode":"SZB","countryCode":"MY","macCode":null,"name":"Subang","shortName":"Sultan Abdul Aziz Shah Airport","code":"SZB"},{"allowed":"False","cityCode":"SUB","countryCode":"ID","macCode":null,"name":"Surabaya","shortName":"Juanda Airport","code":"SUB"},{"allowed":"False","cityCode":"BKK","countryCode":"TH","macCode":null,"name":"Bangkok","shortName":"Suvarnabhumi International","code":"BKK"},{"allowed":"False","cityCode":"SGN","countryCode":"VN","macCode":null,"name":"Tan Son Nhat Airport","shortName":"Tan Son Nhat Airport","code":"SGN"},{"allowed":"False","cityCode":"TWU","countryCode":"MY","macCode":null,"name":"Tawau","shortName":"Tawau Airport","code":"TWU"}]},
                    "marketInfo": {"MarketList":{"AOR":[{"code":"SZB"}],"SZB":[{"code":"AOR"},{"code":"BTH"},{"code":"IPH"},{"code":"JHB"},{"code":"KBR"},{"code":"KNO"},{"code":"KTE"},{"code":"LGK"},{"code":"MES"},{"code":"MKZ"},{"code":"PEN"},{"code":"PKU"},{"code":"SIN"},{"code":"TGG"},{"code":"USM"}],"BKI":[{"code":"KCH"},{"code":"KUL"},{"code":"SBW"}],"KCH":[{"code":"BKI"},{"code":"KUL"},{"code":"SDK"},{"code":"TWU"}],"KUL":[{"code":"BKI"},{"code":"HAK"},{"code":"JHB"},{"code":"KCH"},{"code":"KUA"},{"code":"MYY"},{"code":"NNG"},{"code":"PEN"},{"code":"SBW"},{"code":"SDK"},{"code":"TWU"},{"code":"USM"},{"code":"XCH"}],"SBW":[{"code":"BKI"},{"code":"KUL"},{"code":"MYY"},{"code":"SDK"},{"code":"TWU"}],"BTH":[{"code":"SZB"}],"BTJ":[{"code":"PEN"}],"PEN":[{"code":"BTJ"},{"code":"HAK"},{"code":"HKT"},{"code":"KBR"},{"code":"KNO"},{"code":"KUA"},{"code":"KUL"},{"code":"LGK"},{"code":"MES"},{"code":"MKZ"},{"code":"NNG"},{"code":"SZB"},{"code":"USM"}],"CNX":[{"code":"JHB"}],"JHB":[{"code":"CNX"},{"code":"IPH"},{"code":"KBR"},{"code":"KUA"},{"code":"KUL"},{"code":"SZB"}],"DMK":[],"KBR":[{"code":"DMK"},{"code":"JHB"},{"code":"PEN"},{"code":"SZB"}],"HAK":[{"code":"KUL"},{"code":"PEN"}],"HKT":[{"code":"PEN"}],"IPH":[{"code":"JHB"},{"code":"SIN"},{"code":"SZB"}],"SIN":[{"code":"IPH"},{"code":"KUA"},{"code":"SZB"}],"KUA":[{"code":"JHB"},{"code":"KUL"},{"code":"PEN"},{"code":"SIN"}],"SDK":[{"code":"KCH"},{"code":"KUL"},{"code":"SBW"},{"code":"TWU"}],"TWU":[{"code":"KCH"},{"code":"KUL"},{"code":"MYY"},{"code":"SBW"},{"code":"SDK"}],"KNO":[{"code":"PEN"},{"code":"SZB"}],"KTE":[{"code":"SZB"}],"MYY":[{"code":"KUL"},{"code":"SBW"},{"code":"TWU"}],"NNG":[{"code":"KUL"},{"code":"PEN"}],"USM":[{"code":"KUL"},{"code":"PEN"},{"code":"SZB"}],"XCH":[{"code":"KUL"}],"LGK":[{"code":"PEN"},{"code":"SZB"}],"MES":[{"code":"PEN"},{"code":"SZB"}],"MKZ":[],"PKU":[{"code":"SZB"}],"TGG":[{"code":"SZB"}],"KBV":[{"code":"PEN"}]}}
                };
                origin = $("#AvailabilitySearchInputSearchView_TextBoxMarketOrigin1").val();
                destination = $("#AvailabilitySearchInputSearchView_TextBoxMarketDestination1").val();
                $("#AvailabilitySearchInputSearchVieworiginStation1").change();
                $("#AvailabilitySearchInputSearchViewdestinationStation1").val(destination);
                // Copy options from existing SkySales origin drop down list to the new origin drop down list and append firefly origin stations to the end of the list
                $("#Origin").empty();
                html = '<option value="">Origin</option>';
                html += '<optgroup label="Citilink" style="font-size:11px;color:#127514;">';
                $('#AvailabilitySearchInputSearchVieworiginStation1').find('option').each(function () {
                    if ($(this).val() != '') {
                        html += '<option value="Citilink:' + $(this).val() + '" style="font-size:11px;color:#127514;">' + $(this).text() + '</option>';
                    }
                });
                html += '</optgroup>';
                html += '<optgroup label="Firefly" style="font-size:11px;color:#f26f21;">';
                for (i = 0; i < fireflyResource.stationInfo.StationList.length; i++) {
                    allowed = fireflyResource.stationInfo.StationList[i].allowed;
                    if (allowed == "True") {
                        code = fireflyResource.stationInfo.StationList[i].code;
                        name = fireflyResource.stationInfo.StationList[i].name;
                        if (fireflyResource.marketInfo.MarketList[code] != null) {
                            html += '<option value="Firefly:' + code + '" style="font-size:11px;color:#f26f21;">' + name + ' (' + code + ')</option>';
                        }
                    }
                }
                html += '</optgroup>';
                $("#Origin").append(html);
                $("#Origin").change(function () {
                    $("#Destination").empty();
                    $("#Destination").append('<option value="">Destination</option>');
                    var label = $("#Origin").val();
                    // Populate citilink stations to the destination drop down list if citilink origin station is selected
                    if (label.substring(0, 8) == "Citilink") {
                        stationCode = label.substring(9);
                        $("#AvailabilitySearchInputSearchVieworiginStation1").val(stationCode);
                        $("#AvailabilitySearchInputSearchVieworiginStation1").change();
                        html = '<optgroup label="Citilink" style="font-size:11px;color:#127514;">';
                        $('#AvailabilitySearchInputSearchViewdestinationStation1').find('option').each(function () {
                            if ($(this).val() != '') {
                                html += '<option value="Citilink:' + $(this).val() + '" style="font-size:11px;color:#127514;">' + $(this).text() + '</option>';
                            }
                        });
                        html += '</optgroup>';
                        $("#Destination").append(html);
                        $("#Destination").change(function () {
                            var label = $("#Destination").val();
                            stationCode = label.substring(9);
                            $("#AvailabilitySearchInputSearchViewdestinationStation1").val(stationCode);
                            $("#AvailabilitySearchInputSearchViewdestinationStation1").change();
                        });
                    }
                    // Populate firefly stations to the destination drop down list if firefly origin station is selected
                    if (label.substring(0, 7) == "Firefly") {
                        stationCode = label.substring(8);
                        html = '<optgroup label="Firefly" style="font-size:11px;color:#f26f21;">';
                        for (i = 0; i < fireflyResource.stationInfo.StationList.length; i++) {
                            allowed = fireflyResource.stationInfo.StationList[i].allowed;
                            if (allowed == "True") {
                                code = fireflyResource.stationInfo.StationList[i].code;
                                name = fireflyResource.stationInfo.StationList[i].name;
                                for (j = 0; j < fireflyResource.marketInfo.MarketList[stationCode].length; j++) {
                                    if (fireflyResource.marketInfo.MarketList[stationCode][j].code == code) {
                                        html += '<option value="Firefly:' + code + '" style="font-size:11px;color:#f26f21;">' + name + ' (' + code + ')</option>';
                                    }
                                }
                            }
                        }
                        html += '</optgroup>';
                        $("#Destination").append(html);
                        $("#Destination").change(function () { });
                    }
                });
                $("#Destination").empty();
                $("#Destination").append('<option value="">Destination</option>');
                if (origin != "" && destination != "") {
                    $("#Origin").val("Citilink:" + origin);
                    $("#Origin").change();
                    $("#Destination").val("Citilink:" + destination);
                    $("#Destination").change();
                }
                // Hide original SkySales origin and destination drop down list
                $("#AvailabilitySearchInputSearchVieworiginStation1").hide();
                $("#AvailabilitySearchInputSearchViewdestinationStation1").hide();
                // Override validation to handle redirection logic
                $("#AvailabilitySearchInputSearchView_ButtonSubmit").removeAttr("onclick");
                $("#AvailabilitySearchInputSearchView_ButtonSubmit").click(function () {
                	//debugger;
                    if ($("#Origin").val() == "") {
                        alert("Please choose your origin.");
                        return false;
                    }
                    if ($("#Destination").val() == "") {
                        alert("Please choose your destination.");
                        return false;
                    }
                    if ($("#AvailabilitySearchInputSearchView_RoundTrip:checked").size() > 0) {
                        DepartureDate = $("#AvailabilitySearchInputSearchView_DropDownListMarketMonth1").val() + "-" + $("#AvailabilitySearchInputSearchView_DropDownListMarketDay1").val();
                        ReturnDate = $("#AvailabilitySearchInputSearchView_DropDownListMarketMonth2").val() + "-" + $("#AvailabilitySearchInputSearchView_DropDownListMarketDay2").val();
                        if (DepartureDate > ReturnDate) {
                            alert("Please make sure that your return date is not earlier than your departure date.");
                            return false;
                        }
                    }
                    if ($("#Origin").val().substring(0, 7) == "Firefly") {
                        if ($("#AvailabilitySearchInputSearchView_OneWay:checked").size() > 0)
                        {
                          var str1 = $("#Origin option:selected").text();
                          var str2 = $("#Destination option:selected").text();
                          var str3 = $("#AvailabilitySearchInputSearchView_DropDownListMarketDay1 option:selected").text();
                          var str4 = $("#AvailabilitySearchInputSearchView_DropDownListMarketMonth1 option:selected").text();
                          var str = str1 + " to " + str2 + ", Departing " + str3 + " " + str4;
                          $("#firefly_redirection_text").html(str);
                        }
                        if ($("#AvailabilitySearchInputSearchView_RoundTrip:checked").size() > 0)
                        {
                          var str1 = $("#Origin option:selected").text();
                          var str2 = $("#Destination option:selected").text();
                          var str3 = $("#AvailabilitySearchInputSearchView_DropDownListMarketDay1 option:selected").text();
                          var str4 = $("#AvailabilitySearchInputSearchView_DropDownListMarketMonth1 option:selected").text();
                          var str5 = $("#AvailabilitySearchInputSearchView_DropDownListMarketDay2 option:selected").text();
                          var str6 = $("#AvailabilitySearchInputSearchView_DropDownListMarketMonth2 option:selected").text();
                          var str = str1 + " to " + str2 + ", Departing " + str3 + " " + str4 + "<br/>";
                          str += str2 + " to " + str1 + ", Departing " + str5 + " " + str6 + "<br/>";
                          $("#firefly_redirection_text").html(str);
                        }
                        // Show confirmation popup window if firefly origin and destination cities are selected
                        $("#firefly_redirection").show();
                        return false;
                    }
                    
                    $(".loading").fadeIn(300);
                    $("#res_page").fadeOut(300);
                    $.post('/beginscrap',{
                		origin : $("#Origin").val(),
                		destination : $("#Destination").val(),
                		hari_b : $("#AvailabilitySearchInputSearchView_DropDownListMarketDay1").val(),
                		bulan_b : $("#AvailabilitySearchInputSearchView_DropDownListMarketMonth1").val(),
                		hari_p : $("#AvailabilitySearchInputSearchView_DropDownListMarketDay2").val(),
                		bulan_p : $("#AvailabilitySearchInputSearchView_DropDownListMarketMonth2").val(),
                		istwoway : $("#AvailabilitySearchInputSearchView_RoundTrip").attr('checked') ? 1 : 0
                	},function(res){
                		$("#res_page").html(res);
                		$("#res_page").fadeIn(300);
                		$(".loading").hide();
                	});
                    return true;
                });
                $("#ButtonFireflyRedirectionCancel").click(function () {
                    $("#firefly_redirection").hide();
                });
                $("#ButtonFireflyRedirectionProceed").click(function () {
                    $("#firefly_redirection").hide();
                    if ($("#Origin").val().substring(0, 7) == "Firefly" && $("#Destination").val().substring(0, 7) == "Firefly") {
                        // Redirect user to firefly booking website with citilink organization code
                        Page = "Select";
                        RadioButtonMarketStructure = $("input[name='AvailabilitySearchInputSearchView$RadioButtonMarketStructure']:checked").val();
                        TextBoxMarketOrigin1 = $("#Origin").val().substring(8);
                        TextBoxMarketDestination1 = $("#Destination").val().substring(8);
                        DropDownListMarketMonth1 = $("#AvailabilitySearchInputSearchView_DropDownListMarketMonth1").val();
                        DropDownListMarketDay1 = $("#AvailabilitySearchInputSearchView_DropDownListMarketDay1").val();
                        DropDownListMarketMonth2 = $("#AvailabilitySearchInputSearchView_DropDownListMarketMonth2").val();
                        DropDownListMarketDay2 = $("#AvailabilitySearchInputSearchView_DropDownListMarketDay2").val();
                        AdultCount = $("#AvailabilitySearchInputSearchView_DropDownListPassengerType_ADT").val() * 1;
                        ChildCount = $("#AvailabilitySearchInputSearchView_DropDownListPassengerType_CHD").val() * 1;
                        InfantCount = $("#AvailabilitySearchInputSearchView_DropDownListPassengerType_INFANT").val() * 1;
                        DropDownListPassengerType_ADT = AdultCount + ChildCount;
                        DropDownListPassengerType_INFANT = InfantCount;
                        DropDownListCurrency = "MYR";
                        OrganizationCode = "AGCITILNK";
                        url = "https://booking.fireflyz.com.my/Search.aspx?Page=" + Page;
                        url += "&RadioButtonMarketStructure=" + RadioButtonMarketStructure;
                        url += "&TextBoxMarketOrigin1=" + TextBoxMarketOrigin1;
                        url += "&TextBoxMarketDestination1=" + TextBoxMarketDestination1;
                        url += "&DropDownListMarketMonth1=" + DropDownListMarketMonth1;
                        url += "&DropDownListMarketDay1=" + DropDownListMarketDay1;
                        url += "&DropDownListMarketMonth2=" + DropDownListMarketMonth2;
                        url += "&DropDownListMarketDay2=" + DropDownListMarketDay2;
                        url += "&DropDownListPassengerType_ADT=" + DropDownListPassengerType_ADT;
                        url += "&DropDownListPassengerType_INFANT=" + DropDownListPassengerType_INFANT;
                        url += "&DropDownListCurrency=" + DropDownListCurrency;
                        url += "&OrganizationCode=" + OrganizationCode;
                        top.location = url;
                    }
                });
            });
            //