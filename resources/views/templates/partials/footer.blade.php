<hr>

    <!-- Footer -->
    <footer>
      <div class="footer-distributed">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="https://twitter.com/Ditmawa_IPB">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://web.facebook.com/profile.php?id=100012307542568&_rdc=1&_rdr">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://www.instagram.com/ditmawaipb/">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright 2018 &copy; SUBDIT KESEJAHTERAAN MAHASISWA - IPB</p>
            <p class="copyright text-muted">Gd. Andi Hakim Nasoetion Lt. 1 Jl. Kampus IPB Dramaga Bogor 16680</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{!! asset('asstes/vendor/jquery/jquery.min.js') !!}"></script>
    <script src="{!! asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>

    <!-- Custom scripts for this template -->
    <script src="{!! asset('js/clean-blog.min.js') !!}"></script>

    {{-- dari admin --}}
     <!-- Flot plugins -->
     <script src="{{ asset('assets/admin/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
     <script src="{{ asset('assets/admin/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
     <script src="{{ asset('assets/admin/vendors/flot.curvedlines/curvedLines.js') }}"></script>
   

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.2/axios.js"></script>
    
    @yield('script')
      


  </body>

</html>