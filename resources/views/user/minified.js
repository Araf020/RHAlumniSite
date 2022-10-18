function totalPayable(){var a=checkGraduationYear()/100*(1e3+100*$("#d1la").val()+300*$("#d1da").val()+300*$("#d2la").val()+700*$("#d2da").val()+300*$("#d2dda").val());$("input[name='payment_method']:checked").val(),$("#totalamount").text(a),$("#totalamountToPay").val(a),console.log(a)}function checkGraduationYear(){var a=$("#graduation").val();return console.log(a),a>=2015&&a<=2018?($("#discount_text").html('<span class="sbh_bg">You have 50% discount</span>'),50):a>=2011&&a<=2014?($("#discount_text").html('<span class="sbh_bg">You have 25% discount</span>'),75):($("#discount_text").html(""),100)}function roundNumber(a,t){if((""+a).includes("e")){var e=(""+a).split("e"),n="";return+e[1]+t>0&&(n="+"),+(Math.round(+e[0]+"e"+n+(+e[1]+t))+"e-"+t)}return+(Math.round(a+"e+"+t)+"e-"+t)}$("#graduation").on("keyup",function(){totalPayable(),console.log($("#graduation").val())}),$("#attachment").on("change",function(){"resident"===$(this).val()?$("#Room,#Hall_Duration").show():$("#Room,#Hall_Duration").hide()}),totalPayable(),$("#d1la,#d1da, #d2la, #d2da, #d2dda").on("change",function(){totalPayable()}),$("#image").bind("change",function(){roundNumber(this.files[0].size/1024/1024,2)>2?$("#imagesize").html('<span class="sbh_bg">File size Exceeds 2 MB<br> Please choose a file under 2MB</span>'):$("#imagesize").html('<span class="sbh_bg">Image is ok to be uploaded</span>')}),$("#contact").on("blur",function(){var a=$(this).val(),t=$('meta[name="csrf-token"]').attr("content");$.ajax({url:'{{ asset('checkPhoneNo ') }}',type:"POST",data:{mobile_number:a,_token:t},dataType:"json",success:function(a){"ok"==a.message?($("#from_submit").removeAttr("disabled"),$("#mobileValidation").hide()):($("#from_submit").attr("disabled","disabled"),$("#mobileValidation").html('<span class="sbh_bg">'+a.message+"</span>").show())}})});

// Unminified
  function totalPayable() {
      var a = (checkGraduationYear() / 100) * (1e3 + 100 * $("#d1la").val() + 300 * $("#d1da").val() + 300 * $("#d2la").val() + 700 * $("#d2da").val() + 300 * $("#d2dda").val());
      $("input[name='payment_method']:checked").val();
      $("#totalamount").text(a), $("#totalamountToPay").val(a);
      console.log(a);
  }

  function checkGraduationYear() {
  	var grad_year = $("#graduation").val();
  	console.log(grad_year);
  	if(grad_year >= 2015 && grad_year <= 2018){
  		$("#discount_text").html('<span class="sbh_bg">You have 50% discount</span>');
  		return 50;
  	}else if(grad_year >= 2011 && grad_year <= 2014){
  		$("#discount_text").html('<span class="sbh_bg">You have 25% discount</span>');
  		return 75;
  	}else if(grad_year <=2010){
  		$("#discount_text").html('');
  		return 100;
  	}else{
  		$("#discount_text").html('');
  		return 100;
  	}
  }

  $("#graduation").on('keyup',function(){
  	totalPayable();
  	console.log($("#graduation").val());
  });

  function roundNumber(a, e) {
      if (("" + a).includes("e")) {
          var t = ("" + a).split("e"),
              n = "";
          return +t[1] + e > 0 && (n = "+"), +(Math.round(+t[0] + "e" + n + (+t[1] + e)) + "e-" + e)
      }
      return +(Math.round(a + "e+" + e) + "e-" + e)
  }
  $("#attachment").on("change", function() {
      "resident" === $(this).val() ? $("#Room,#Hall_Duration").show() : $("#Room,#Hall_Duration").hide()
  }), totalPayable(), $("#d1la,#d1da, #d2la, #d2da, #d2dda").on("change", function() {
      totalPayable()
  }), $("#image").bind("change", function() {
      roundNumber(this.files[0].size / 1024 / 1024, 2) > 2 ? $("#imagesize").html('<span class="sbh_bg">File size Exceeds 2 MB<br> Please choose a file under 2MB</span>') : $("#imagesize").html('<span class="sbh_bg">Image is ok to be uploaded</span>')
  });
  $("#contact").on("blur", function() {
      var t = $(this).val(),
          a = $('meta[name="csrf-token"]').attr("content");
      $.ajax({
          url: '{{ asset('checkPhoneNo ') }}',
          type: "POST",
          data: {
              mobile_number: t,
              _token: a
          },
          dataType: "json",
          success: function(t) {
              "ok" == t.message ? ($("#from_submit").removeAttr("disabled"), $("#mobileValidation").hide()) : ($("#from_submit").attr("disabled", "disabled"), $("#mobileValidation").html('<span class="sbh_bg">' + t.message + "</span>").show())
          }
      })
  });