$(document).ready(function() {

    $('#slide-1').carousel({
        interval: 20000
    });
    $('#slide-2').carousel({
        interval: time_slider2
    });
    $('#slide-3').carousel({
        interval: 10000
    });

// Create two variable with the names of the months and days in an array
    var monthNames = [ "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" ];
    var dayNames= ["MINGGU","SENIN","SELASA","RABU","KAMIS","JUMAT","SABTU"]
    setInterval( function() {
// Create a newDate() object
    var newDate = new Date();
// Extract the current date from Date object
    newDate.setDate(newDate.getDate());
// Output the day, date, month and year
    $('#Date').html(dayNames[newDate.getDay()] + " - " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());
    },1000);
    setInterval( function() {
        // Create a newDate() object and extract the seconds of the current time on the visitor's
        var seconds = new Date().getSeconds();
        // Add a leading zero to seconds value
        $("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);

    },1000);

    setInterval( function() {
        // Create a newDate() object and extract the minutes of the current time on the visitor's
        var minutes = new Date().getMinutes();
        // Add a leading zero to the minutes value
        $("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
    },1000);

    setInterval( function() {
        // Create a newDate() object and extract the hours of the current time on the visitor's
        var hours = new Date().getHours();
        // Add a leading zero to the hours value
        $("#hours").html(( hours < 10 ? "0" : "" ) + hours);
    }, 1000);
//Remove Calender
    $('.w3-ripple').trigger('click');
    $(".w3-dropdown-click, .w3-button, .w3-display-middle, .w3-display-bottommiddle").remove();

    //Pray Time

    setInterval(function(){
        prayTimes.adjust( { fajr:20, dhuhr:1,  maghrib:1, isha: 18} );

        var date = new Date();
        prayTimes.tune( {fajr:2, sunrise: 15, dhuhr:2, asr: 2, maghrib:2, isha: 2} );

        var times = prayTimes.getTimes(date, [latitude, logitude], +7, 0);
        prayTimes.setMethod('Indonesia');

        document.getElementById("subuh").innerHTML = times.fajr;
        document.getElementById("syuruq").innerHTML = times.sunrise;
        document.getElementById("dzuhur").innerHTML = times.dhuhr;
        document.getElementById("ashar").innerHTML = times.asr;
        document.getElementById("maghrib").innerHTML = times.maghrib;
        document.getElementById("isya").innerHTML = times.isha;

        var time = moment().subtract(2,'minutes').format('HH:mm');
        var time2 = moment().format('HH:mm');
        var time3 = moment().subtract(12,'minutes').format('HH:mm');
        if(time <= times.fajr){
            $("#bg_isya").removeClass("jamactive");
            $("#bg_subuh").addClass("jamactive");
            $("#isya").removeClass("textactive");
            if(time2 >= times.fajr){
                $("#subuh").addClass("textactive");
                // console.log('subuh');
                if(time >= times.fajr){
                    show_modal();
                }
            }
        }
        else if(time <= times.sunrise){
            $("#bg_subuh").removeClass("jamactive");
            $("#bg_syuruq").addClass("jamactive");
            $("#subuh").removeClass("textactive");
            // console.log('syuruq1');
            if(time3 === times.fajr){
                // console.log('off');
                toggleSwitcherTV();
            }
            if(time2 >= times.sunrise){
                $("#syuruq").addClass("textactive");
                // console.log('syuruq');
            }

        }
        else if(time <= times.dhuhr){
            $("#bg_syuruq").removeClass("jamactive");
            $("#bg_dzuhur").addClass("jamactive");
            $("#syuruq").removeClass("textactive");
            if(time2 >= times.dhuhr){
                $("#dzuhur").addClass("textactive");
                // console.log('dzuhur');
                if(time >= times.dhuhr){
                    show_modal();
                }
            }
        }
        else if(time <= times.asr){
            $("#bg_dzuhur").removeClass("jamactive");
            $("#bg_ashar").addClass("jamactive");
            $("#dzuhur").removeClass("textactive");
            if(time3 === times.dhuhr){
                toggleSwitcherTV();
                // console.log('off');
            }
            if(time2 >= times.asr){
                $("#ashar").addClass("textactive");
                // console.log('ashar');
                if(time >= times.asr){
                    show_modal();
                }
            }
        }
        else if(time <= times.maghrib){
            $("#bg_ashar").removeClass("jamactive");
            $("#bg_maghrib").addClass("jamactive");
            $("#ashar").removeClass("textactive");
            if(time3 === times.asr){
                toggleSwitcherTV();
                // console.log('off');
            }
            if(time2 >= times.maghrib){
                $("#maghrib").addClass("textactive");
                // console.log('maghrib');
                if(time >= times.maghrib){
                    show_modal();
                }
            }
        }
        else if(time <= times.isha){
            $("#bg_maghrib").removeClass("jamactive");
            $("#bg_isya").addClass("jamactive");
            $("#maghrib").removeClass("textactive");
            if(time3 === times.maghrib){
                toggleSwitcherTV();
                // console.log('off');
            }
            if(time2 >= times.isha){
                $("#isya").addClass("textactive");
                // console.log('isya');
                if(time >= times.isha){
                    show_modal();
                }
            }
        }
        else if(time > times.isha){
            if(time3 === times.isha){
                // console.log('off');
                toggleSwitcherTV();
            }
            $("#bg_isya").removeClass("jamactive");
            $("#bg_subuh").addClass("jamactive");
            $("#isya").removeClass("textactive");
        }



    }, 1000);
});

//Modal
function show_modal() {
    $('#modal-container').removeAttr('class').addClass('one');
    // $('body').addClass('modal-active');
    $('#countdowntime').show();
    doa_adzan();
    timer();

}
function hide_modal(){
    $('#modal-container').addClass('out');
    // console.log('delay')
    // $('body').delay(40000).removeClass('modal-active');
}
//doa adzan slider pertaama setelah popup
function doa_adzan(){
    document.getElementById("caraosel-2").innerHTML = "<div class=\"carousel-item active\" style=\"background-color: rgba(47, 53, 66,0.7); \">\n" +
        "                                    <label class=\"badge p-1 mt-3\"><h2 class=\"bg_shadow\">DOA SETELAH ADZAN</h2></label>\n" +
        "                                    <div class=\"carousel-caption d-none d-md-block\">\n" +
        "                                        <h1 class=\"arab bg_shadow\">اَللّٰهُمَّ رَبَّ هٰذِهِ الدَّعْوَةِ التَّآمَّةِ، وَالصَّلاَةِ الْقَآئِمَةِ، آتِ مُحَمَّدَانِ الْوَسِيْلَةَ وَالْفَضِيْلَةَ، وَابْعَثْهُ مَقَامًامَحْمُوْدَانِ الَّذِىْ وَعَدْتَهُْ</h1>\n" +
        "                                        <p class=\"terjemah lead bg_shadow\">\"Ya Allah, Rabb pemilik panggilan yang sempurna, dan sholat yang tetap didirikan. Berikanlah derajat di Surga, dan keutamaan kepada Muhammad ﷺ‎. Dan bangkitkanlah beliau sehingga bisa menempati maqam terpuji yang telah engkau janjikan.\"</p>\n" +
        "                                    </div>\n" +
        "                                </div>";
}
//setelah doa adzan
function setelah_adzan(){
    document.getElementById("caraosel-2").innerHTML = "<div class=\"carousel-item active\" style=\"background-color: rgba(47, 53, 66,0.7); text-align: center;\">\n" +
        "                                    <label class=\"badge p-1 mt-3\" style=\"color: white;\"><h2 class=\"bg_shadow\">DOA YANG TIDAK TERTOLAK</h2></label>\n" +
        "                                    <div class=\"carousel-caption d-none d-md-block\">\n" +
        "                                        <h2 class=\"display-4 bg_shadow\">إِنَّ الدُّعَاءَ لاَ يُرَدُّ بَيْنَ الأَذَانِ وَالإِقَامَةِ فَادْعُوا</h2>\n" +
        "                                        <p class=\"lead bg_shadow\">\"“Sungguh berdo’a antara adzan dan iqomah tidak tertolak, maka pergunakanlah untuk berdo’a.” (HR. Ahmad).\"</p>\n" +
        "                                    </div>\n" +
        "                                </div>\n" +
        "                                <!-- Slide Two - Set the background image for this slide in the line below -->\n" +
        "                                <div class=\"carousel-item\" style=\"background-color: rgba(47, 53, 66,0.7); text-align: center;\">\n" +
        "                                    <label class=\"badge p-1 mt-3\"><h2 class=\"bg_shadow\">SHALAT SUNNAH</h2></label>\n" +
        "                                    <div class=\"carousel-caption d-none d-md-block\">\n" +
        "                                        <h2 class=\"display-4 bg_shadow\">من صلى ثنتي عشرة ركعة تطوعا في اليوم والليلة ، بني له بهن بيت في الجنةِ</h2>\n" +
        "                                        <p class=\"lead bg_shadow\">\"“barangsiapa yang shalat sunnah 12 rakaat dalam sehari semalam, Allah akan bangunkan untuknya rumah di surga” (HR. Muslim no. 728).\"</p>\n" +
        "                                    </div>\n" +
        "                                </div>";
}
//lurus rapatkan shaft setelah countdown selesai
function LurusRapat(){
    document.getElementById("caraosel-2").innerHTML = "<div class=\"carousel-item active\" style=\"background-color: rgba(47, 53, 66,0.7)\">\n" +
        "                                        <h1 class=\"arab bg_shadow\" id=\"lurusrapat\"></h1>\n" +
        "<div class=\"carousel-caption\">\n" +
        "<img src=\"/images/shaf_rapat.png\" width=\"50%\" style=\"-webkit-filter: drop-shadow(5px 5px 5px #1e90ff );\n" +

        "  filter: drop-shadow(5px 5px 5px #1e90ff);\" alt=\"Cinque Terre\">"+
        "                                    </div>\n" +
        "                                </div>";
    new TypeIt('#lurusrapat', {
        strings: ["LURUSKANLAH SHAF KARENA LURUSNYA SHAF MERUPAKAN BAGIAN DARI KESEMPURNAAN SHALAT"],
        speed: 20,
        breakLines: true,
        waitUntilVisible: true
    }).go();
}
//doa setelah shalat di popup modal
function DoaSetelahShalat(){
    document.getElementById("caraosel-2").innerHTML = " <div class=\"carousel-item active pt-3 pb-3 \" style=\"background-color: rgba(47, 53, 66,0.7); text-align: center; height: 100vh;\">\n" +
        "                                    <label class=\"badge p-2 mt-3\"><h2 class=\"bg_shadow\">DZIKIR SETELAH SHALAT</h2></label>\n" +
        " <h1 class=\" bg_shadow\">أَسْتَغْفِرُ اللهَ ِ</h1>\n" +
        "                                    <p class=\"lead bg_shadow\">Astagh-firullah 3x</p>\n" +
        "                                    <h1 class=\" bg_shadow\">اَللَّهُمَّ أَنْتَ السَّلاَمُ، وَمِنْكَ السَّلاَمُ، تَبَارَكْتَ يَا ذَا الْجَلاَلِ وَاْلإِكْرَامِ</h1>\n" +
        "                                    <p class=\"lead bg_shadow\">Allahumma antas salaam wa minkas salaam tabaarokta yaa dzal jalaali wal ikrom.</p>\n" +
        "                                    <h1 class=\" bg_shadow\">لاَ إِلَـهَ إِلاَّ اللهُ وَحْدَهُ لاَ شَرِيْكَ لَهُ، لَهُ الْمُلْكُ وَلَهُ الْحَمْدُ وَهُوَ عَلَى كُلِّ شَيْءٍ قَدِيْرُ، اَللَّهُمَّ لاَ مَانِعَ لِمَا أَعْطَيْتَ، وَلاَ مُعْطِيَ لِمَا مَنَعْتَ، وَلاَ يَنْفَعُ ذَا الْجَدِّ مِنْكَ الْجَدُِّ</h1>\n" +
        "                                    <p class=\"lead bg_shadow\">Laa ilaha illallah wahdahu laa syarika lah, lahul mulku wa lahul hamdu wa huwa ‘ala kulli syai-in qodiir. Allahumma laa maani’a limaa a’thoyta wa laa mu’thiya limaa mana’ta wa laa yanfa’u dzal jaddi minkal jaddu.</p>\n" +
        " <h1 class=\" bg_shadow\">[33] اَللهُ أَكْبَرُ [33] | اَلْحَمْدُ لِلَّهِِِ [33] | سُبْحَانَ اللهِِ</h1>\n" +
        "                                    <p class=\"lead bg_shadow\"> Allahu akbar (33 x) | Al hamdulillah (33x) | Subhanallah (33x)</p>\n" +
        " <h1 class=\" bg_shadow\">لاَ إِلَـهَ إِلاَّ اللهُ وَحْدَهُ لاَ شَرِيْكَ لَهُ، لَهُ الْمُلْكُ وَلَهُ الْحَمْدُ وَهُوَ عَلَى كُلِّ شَيْءٍ قَدِيْرُِِ</h1>\n" +
        "                                    <p class=\"lead bg_shadow\">Laa ilaha illallah wahdahu laa syarika lah. Lahul mulku wa lahul hamdu wa huwa ‘ala kulli syai-in qodiir.</p>\n" +
        "                            </div>";

}
//Power Off
$(document).ready(buildTimeline);
var SELECTOR_SCREEN_ELEMENT = '.screen';
var SELECTOR_SWITCHER_TV = '#switcher-tv';
var isTurnedOn = true;
var timeline;
function buildTimeline() {
    timeline = new TimelineMax({
        paused: true
    });
    timeline
        .to(SELECTOR_SCREEN_ELEMENT, .2, {
            width: '100vw',
            height: '2px',
            background: '#ffffff',
            ease: Power2.easeOut
        })
        .to(SELECTOR_SCREEN_ELEMENT, .2, {
            width: '0',
            height: '0',
            background: '#ffffff'
        });
}
var x = document.getElementById("switcher-tv");
function toggleSwitcherTV() {
    if (x.className === "on") {
        timeline.restart();
        document.getElementById("switcher-tv").className = "off";
    }

    if (!isTurnedOn) {
        // timeline.reverse();
        isTurnedOn = !isTurnedOn;

    }
}
$(document).on('click', SELECTOR_SWITCHER_TV, function() {
    toggleSwitcherTV();
});

//Timer Countdown

function timer() {
    var timer = document.getElementById("timer");
    if (timer.className === "on") {
        Countdown.init();
        document.getElementById("timer").className = "off";
        doa_adzan();
        setTimeout(function(){
            setelah_adzan();
        }, 60000);
    }
    else {

    }
}

// Button On
var onButtonDown = function(index){
    if((index === 7) || (index === 8)){
        DoaSetelahShalat();
        timeline.reverse();
        document.getElementById("switcher-tv").className = "on";
        document.getElementById("timer").className = "on";
        $('#countdowntime').hide();
        //waktu dzikir setelah shalat
        setTimeout(function(){
            hide_modal();
        }, time_dzikir);
    }
}
