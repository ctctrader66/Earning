const second = 1000,
         minute = second * 60,
         hour = minute * 60,
         day = hour * 24;
         
         let countDown = new Date('May 27, 2021 20:00:00').getTime(),
                           x = setInterval(function() {
                                             let now = new Date().getTime(),
                                             distance = now - countDown;
                                             document.getElementById('days').innerText = Math.floor(distance / (day)),
                                             document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
                                             document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
                                             document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);
                                           }, second);
         
         var items = document.getElementsByClassName("fade-item");
         for (let i = 0; i < items.length; ++i) {
           fadeIn(items[i], i * 1000)
         }
         
         function fadeIn (item, delay) {
           setTimeout(() => {
             item.classList.add('fadein')
           }, delay)
         }
         $(document).ready(function(){
         
         $(".tabs-list li a").click(function(e){
          e.preventDefault();
         });
         
         $(".tabs-list li").click(function(){
          var tabid = $(this).find("a").attr("href");
          $(".tabs-list li,.tabs div.tab").removeClass("active");   // removing active class from tab
         
          $(".tab").hide();   // hiding open tab
          $(tabid).show();    // show tab
          $(this).addClass("active"); //  adding active class to clicked tab
         
         });
         
         });
         
         var vsOpts = {
         $slides: $('.v-slide'),
         $list: $('.v-slides'),
         $slides2: $('.v-slide2'),
         $list2: $('.v-slides2'),
         $slides3: $('.v-slide3'),
         $list3: $('.v-slides3'),
         $slides4: $('.v-slide4'),
         $list4: $('.v-slides4'),
         duration: 40,
         lineHeight: 50
         }
         
         var vSlide = new TimelineMax({
         paused: false,
         repeat: 1
         });
         
         var vSlide2 = new TimelineMax({
         paused: false,
         repeat: 1
         });
         
         var vSlide3 = new TimelineMax({
         paused: false,
         repeat: 1
         });
         
         var vSlide4 = new TimelineMax({
         paused: false,
         repeat: 1
         });
         
         vsOpts.$slides.each(function(i) {
         console.log('length : '+ vsOpts.$slides.length);
         vSlide.to(vsOpts.$list, vsOpts.duration / vsOpts.$slides.length, {
           y: i * -1 * 70,
           ease: Elastic.easeOut.config(1, 0.4)
         });
         });
         
         vSlide.play();
         
         vsOpts.$slides2.each(function(i) {
         console.log('length2 : '+ vsOpts.$slides2.length);
         vSlide2.to(vsOpts.$list2, vsOpts.duration / vsOpts.$slides2.length, {
           y: i * -1 * 70,
           ease: Elastic.easeOut.config(1, 0.4)
         });
         });
         
         vSlide2.play();
         
         vsOpts.$slides3.each(function(i) {
         console.log('length3 : '+ vsOpts.$slides3.length);
         vSlide3.to(vsOpts.$list3, vsOpts.duration / vsOpts.$slides3.length, {
           y: i * -1 * 70,
           ease: Elastic.easeOut.config(1, 0.4)
         });
         });
         
         vSlide3.play();
         
         vsOpts.$slides4.each(function(i) {
         console.log('length4 : '+ vsOpts.$slides4.length);
         vSlide4.to(vsOpts.$list4, vsOpts.duration / vsOpts.$slides4.length, {
           y: i * -1 * 70,
           ease: Elastic.easeOut.config(1, 0.4)
         });
         });
         
         vSlide4.play();
         
     