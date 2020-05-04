    
  </main>
  <!-- /main -->
  
  <footer class="inverse-wrapper" style="margin-top: 10px;">
    <div class="container inner">
      <div class="row">
        <div class="col-sm-3">
          <div class="widget">
            <h4 class="widget-title">Popular Posts</h4>
            <ul class="post-list">
              <li>
                <figure class="overlay"> <a href="#"><img src="{{asset('public/front')}}/style/images/art/a1.jpg" alt="" /> </a> </figure>
                <div class="post-content">
                  <p> <a href="#">About Nature</a> </p>
                  <div class="meta"><span class="date">3th Oct 2019</span> </div>
                </div>
              </li>
              <li>
                <figure class="overlay"> <a href="#"><img src="{{asset('public/front')}}/style/images/art/a2.jpg" alt="" /> </a> </figure>
                <div class="post-content">
                  <p> <a href="#">About Lifestyle</a> </p>
                  <div class="meta"><span class="date">28th Sep 2019</span> </div>
                </div>
              </li>
              <li>
                <figure class="overlay"> <a href="#"><img src="{{asset('public/front')}}/style/images/art/a3.jpg" alt="" /> </a> </figure>
                <div class="post-content">
                  <p> <a href="#">About Wedding</a> </p>
                  <div class="meta"><span class="date">15th Feb 2020</span> </div>
                </div>
              </li>
            </ul>
            <!-- /.post-list --> 
          </div>
          <!-- /.widget --> 
        </div>
        <!-- /column -->
        
        <div class="col-sm-3">
          <div class="widget">
            <h4 class="widget-title">Recent Tags</h4>
            <ul class="tag-list">
              <li> <a href="#" class="btn">Blog</a> </li>
              <li> <a href="#" class="btn">Photography</a> </li>
              <li> <a href="#" class="btn">Illustation</a> </li>
              <li> <a href="#" class="btn">Fun</a> </li>
            </ul>
          </div>
          <!-- /.widget -->
          <div class="widget">
            <h4 class="widget-title">Top Categories</h4>
            <ul class="circled">
              <li> <a href="#">Lifestyle (21)</a> </li>
              <li> <a href="#">Photography (19)</a> </li>
              <li> <a href="#">Wildlife (16)</a> </li>
              <li> <a href="#">Wedding (7)</a> </li>
            </ul>
          </div>
          <!-- /.widget --> 
        </div>
        <!-- /column -->
        
        <div class="col-sm-3">
          <div class="widget">
            <h4 class="widget-title">Get in Touch</h4>
            <address>
            <strong>Malory, Inc.</strong><br>
            Moon Street Light Avenue, 14/05 <br>
            Jupiter, JP 80630<br>
            <abbr title="Phone">P:</abbr> (123) 456-7890 <br>
            <abbr title="Email">E:</abbr> first.last@example.com
            </address>
          </div>
          <!-- /.widget -->
          <div class="widget">
            <h4 class="widget-title">Elsewhere</h4>
            <ul class="social">
              <li> <a href="#"><i class="icon-s-rss"></i></a> </li>
              <li> <a href="#"><i class="icon-s-twitter"></i></a> </li>
              <li> <a href="#"><i class="icon-s-facebook"></i></a> </li>
              <li> <a href="#"><i class="icon-s-pinterest"></i></a> </li>
              <li> <a href="#"><i class="icon-s-linkedin"></i></a> </li>
              <li> <a href="#"><i class="icon-s-forrst"></i></a> </li>
            </ul>
          </div>
          <!-- /.widget --> 
          
        </div>
        <!-- /column -->
        
        <div class="col-sm-3">
          <div class="widget">
            <h4 class="widget-title">About Me</h4>
            <figure> <img src="{{asset('public/front')}}/style/images/art/about.jpg" alt="" /> </figure>
            <div class="divide10"></div>
            <p>Most photographs are created using a camera, which uses a lens to focus the scene's visible wavelengths of light into a reproduction of what the human eye would see.</p>
          </div>
          <!-- /.widget --> 
        </div>
        <!-- /column --> 
        
      </div>
      <!-- /.row --> 
      
    </div>
    <!-- .container -->
    
    <div class="sub-footer">
      <div class="container inner">
        <p class="text-center">© 2020 . All rights reserved. Theme by <a href="#">Bit</a> .</p>
      </div>
      <!-- .container --> 
    </div>
    <!-- .sub-footer --> 
    
  </footer>
  <!-- /footer --> 
  
</div>
<!-- /.animsition --> 
<script src="{{asset('public/front')}}/style/js/jquery.min.js"></script> 
<script src="{{asset('public/front')}}/style/js/bootstrap.min.js"></script> 
<script src="{{asset('public/front')}}/style/revolution/js/jquery.themepunch.tools.min838f.js?rev=5.0"></script> 
<script src="{{asset('public/front')}}/style/revolution/js/jquery.themepunch.revolution.min838f.js?rev=5.0"></script> 
<script src="{{asset('public/front')}}/style/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="{{asset('public/front')}}/style/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="{{asset('public/front')}}/style/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="{{asset('public/front')}}/style/js/plugins.js"></script> 
<script src="{{asset('public/front')}}/style/js/scripts.js"></script>
<!-- DEMO ONLY -->

<script type="text/javascript" src="{{asset('public/front')}}/switcher/switchstylesheet.js"></script>
<script type="text/javascript">
$(document).ready(function(){ 
	$(".changecolor").switchstylesheet( { seperator:"color"} );
});
</script>
@yield('script')
</body>

<!-- Mirrored from themes.iki-bir.com/malory/index3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2020 15:42:39 GMT -->
</html>