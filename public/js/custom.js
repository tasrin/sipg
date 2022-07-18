// Restricts input for each element in the set of matched elements to the given inputFilter.
(function($) {
    $.fn.inputFilter = function(inputFilter) {
      return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
        if (inputFilter(this.value)) {
          this.oldValue = this.value;
          this.oldSelectionStart = this.selectionStart;
          this.oldSelectionEnd = this.selectionEnd;
        } else if (this.hasOwnProperty("oldValue")) {
          this.value = this.oldValue;
          this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
        } else {
          this.value = "";
        }
      });
    };
  }(jQuery));
  
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $("#load").fadeOut(200);
});
function format(element) {
    $(element).inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        prefix: ' ',
        rightAlign: false,
        nullable: false,
        clearMaskOnLostFocus: true
    });
}

function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

$(document).ready(function(){
    $('form').submit(function() {
        $(this).find("button[type='reset']").prop('disabled',true);
        $(this).find("button[type='submit']").prop('disabled',true);
    });

    $('form').submit(function() {
        $("#loading").addClass('overlay');
        $("#loading").html('<i class="fa fa-spinner fa-spin"></i>');
        $(window).on('load', function(){
            setTimeout(RemoveClass, 1000);
        });
    });

    function RemoveClass() {
        $('#loading').removeClass("overlay");
        $("#loading").remove();
    }
});