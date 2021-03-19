@push('css')

@endpush

@extends('frontend.main-1')

@section('content')

@include('frontend.include.breadcrumb')
<div class="site-content">
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Main Wrapper
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div class="main-wrapper ptb-80 style-two">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--~~~~~ Start Site Main ~~~~~-->
                   <main class="site-main"> 
                       
                    <!-- <p style="text-align:justify;font-size:14px;">Pertanyaan - pertanyaan yang berulangkali ditanyakan</p>                    -->
                    
                    <form id="regForm" method="post" action="{{ action('Frontend\HomeController@ikmSave') }}">
                        @csrf
                        <h1>SURVEY PELAYANAN</h1>
                        <center><img src="{{ asset('assets/frontend/images/logo/logo-bkd.png')}}" ></center>
                        <!-- One "tab" for each step in the form: -->
                        @if(session()->has('gagal'))
                                    {{-- <div class="reviews-comments-item-text fl-wrap" style="margin-bottom:10px;">
                                        <p>" {{ session()->get('message') }} "</p>
                                    </div> --}}
                                    <div class="alert alert-danger" role="alert">
                                        <p>{{ session()->get('gagal') }}</p>
                                      </div>
                                @endif
                                @if(session()->has('sukses'))
                                    {{-- <div class="reviews-comments-item-text fl-wrap" style="margin-bottom:10px;">
                                        <p>" {{ session()->get('message') }} "</p>
                                    </div> --}}
                                    <div class="alert alert-success" role="alert">
                                        <p>{{ session()->get('sukses') }}</p>
                                      </div>
                                @endif
                        <div class="tab">
                           DATA DIRI :
                           <!-- <p><input placeholder="First name..." oninput="this.className = ''" name="fname"></p> -->
                           <p>
                              <label style="color: black;"><b>Nama</b></label>
                              <input type="text" name="nama" placeholder="Nama Lengkap" /> 
                           </p>
                           <p>
                              <label style="color: black;"><b>Email</b></label>
                              <input type="email" name="email" placeholder="Email" /> 
                           </p>
                           <p>
                              <label style="color: black;"><b>Umur</b></label>
                              <input type="number" name="umur" placeholder="Umur" />
                           </p>
                           <p>
                              <label style="color: black;"><b>Jenis Kelamin</b></label>
                           <div class="btn-group btn-group-toggle d-flex justify-content-center" data-toggle="buttons" >
                              <label class="btn btn-outline-primary">
                              <input type="radio" name="kelamin" id="kelamin" value="0" autocomplete="off"/>Pria
                              </label>
                              <label class="btn btn-outline-primary">
                              <input type="radio" name="kelamin" id="kelamin" value="1" autocomplete="off"/>Wanita
                              </label>
                           </div>
                           <p style="color: red;">* Pastikan untuk memilih pilihan diatas</p>
                           </p>
                        </div>
                        <div class="tab">
                           PERTANYAAN :
                           <?php $i = 1; ?>
                           @foreach($pertanyaan as $item)
                           <p>
                              <label style="color: black;"><b>{{ $i }}. {{ $item->pertanyaan }}</b></label>
                           <div class="btn-group btn-group-toggle d-flex justify-content-center" data-toggle="buttons">
                              <label class="btn btn-outline-primary">
                              <input type="radio" name="no{{ $i }}" id="no{{ $i }}" value="1" autocomplete="off" />
                              {{ $item->jawaban1 }}
                              </label>
                              <label class="btn btn-outline-primary">
                              <input type="radio" name="no{{ $i }}" id="no{{ $i }}" value="2" autocomplete="off"/>
                              {{ $item->jawaban2 }}
                              </label>
                              <label class="btn btn-outline-primary">
                              <input type="radio" name="no{{ $i }}" id="no{{ $i }}" value="3" autocomplete="off"/>
                              {{ $item->jawaban3 }}
                              </label>
                              <label class="btn btn-outline-primary">
                              <input type="radio" name="no{{ $i }}" id="no{{ $i }}" value="4" autocomplete="off"/>
                              {{ $item->jawaban4 }}
                              </label>
                           </div>
                           <p style="color: red;">* Pastikan untuk memilih pilihan diatas</p>
                           </p>
                           <?php $i++; ?>
                           @endforeach
                           <p>
                              <label style="color: black;"><b>Masukan Untuk Pelayanan</b></label>
                              <input type="text" name="masukan" placeholder="Masukan" /> 
                           </p>
                        </div>
                        <div style="overflow:auto;">
                           <div style="float:right;">
                              <button type="button" id="prevBtn" onclick="nextPrev(-1)">Kembali</button>
                              <button type="button" id="nextBtn" onclick="nextPrev(1)">Selanjutnya</button>
                           </div>
                        </div>
                        <!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;margin-top:40px;">
                           <span class="step"></span>
                           <span class="step"></span>
                        </div>
                     </form>

                    

                    </main>
                </div>
                
              
            </div>
        </div>
    </div><!--~./ end main wrapper ~-->
</div>
@endsection

@push('js')
<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the crurrent tab
    
    function showTab(n) {
      // This function will display the specified tab of the form...
      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";
      //... and fix the Previous/Next buttons:
      if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
      } else {
        document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Simpan";
      } else {
        document.getElementById("nextBtn").innerHTML = "Selanjutnya";
      }
      //... and run a function that will display the correct step indicator:
      fixStepIndicator(n)
    }
    
    function nextPrev(n) {
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab");
      // Exit the function if any field in the current tab is invalid:
      if (n == 1 && !validateForm()) return false;
      // Hide the current tab:
      x[currentTab].style.display = "none";
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
      // if you have reached the end of the form...
      if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
      }
      // Otherwise, display the correct tab:
      showTab(currentTab);
    }
    
    function validateForm() {
      // This function deals with validation of the form fields
      var x, y, i, valid = true;
      x = document.getElementsByClassName("tab");
      y = x[currentTab].getElementsByTagName("input");
      
    
      // A loop that checks every input field in the current tab:
      for (i = 0; i < y.length; i++) {
        console.log(y[i].value);
        // If a field is empty...
        if (y[i].value == "") {
          // add an "invalid" class to the field:
          y[i].className += " invalid";
          // and set the current valid status to false
          valid = false;
        }
      }
      // If the valid status is true, mark the step as finished and valid:
      if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
      }
      return valid; // return the valid status
    }
    
    function fixStepIndicator(n) {
      // This function removes the "active" class of all steps...
      var i, x = document.getElementsByClassName("step");
      for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
      }
      //... and adds the "active" class on the current step:
      x[n].className += " active";
    }
    </script>
@endpush

@push('css')
<style>
    * {
      box-sizing: border-box;
    }
    
    body {
      background-color: #f1f1f1;
    }
    
    #regForm {
      background-color: #ffffff;
      margin: auto;
      font-family: Raleway;
      padding: 40px;
      width: 100%;
      min-width: 300px;
    }
    
    h1 {
      text-align: center;  
    }
    
    input {
      padding: 10px;
      width: 100%;
      font-size: 17px;
      font-family: Raleway;
      border: 1px solid #aaaaaa;
    }
    
    /* Mark input boxes that gets an error on validation: */
    input.invalid {
      background-color: #ffdddd;
    }
    
    /* Hide all steps by default: */
    .tab {
      display: none;
    }
    
    button {
      background-color: #4CAF50;
      color: #ffffff;
      border: none;
      padding: 10px 20px;
      font-size: 17px;
      font-family: Raleway;
      cursor: pointer;
    }
    
    button:hover {
      opacity: 0.8;
    }
    
    #prevBtn {
      background-color: #bbbbbb;
    }
    
    /* Make circles that indicate the steps of the form: */
    .step {
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbbbbb;
      border: none;  
      border-radius: 50%;
      display: inline-block;
      opacity: 0.5;
    }
    
    .step.active {
      opacity: 1;
    }
    
    /* Mark the steps that are finished and valid: */
    .step.finish {
      background-color: #4CAF50;
    }
    .radio-group {
        position: relative;
        margin-bottom: 25px
    }
    
    .radio {
        display: inline-block;
        width: 204;
        height: 104;
        border-radius: 0;
        background: lightblue;
        box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
        box-sizing: border-box;
        cursor: pointer;
        margin: 8px 2px
    }
    
    .radio:hover {
        box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3)
    }
    
    .radio.selected {
        box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
    }
    </style>
@endpush