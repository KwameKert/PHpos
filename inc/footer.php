<div class="footer text-muted">
						&copy; 2019. <a href="#">Powered by </a> Adepa Technologies &copy;<?php date('Y');?><a href="#" target="_blank"></a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>

<?php if(isset($page) && $page != "home"){ require_once('javascript.php');} ?>

<script>

    $(document).ready(function() {
        $('.single-select').select2();
        $('#myTable').DataTable();
    });
    $(document).ready(function(e) {

        $(document).on("click",".delete",function(m){
            
            var am=$(this);
           
            m.preventDefault();
            bootbox.confirm("<h4>Are you sure you want to delete that?</h4>",function(d){
                if(d){
                    data=am.attr("data-id");
                    t=am.attr("type");
                    $.ajax({url:"../scripts/deleteitem.php",data:"id="+data+"&type="+t,type:"POST",success:function(text){
                        if(text ==0){
                            makeToast("Couldn't delete Item - Please check connection and try again!","red");
                        }else{
                            am.closest("tr").remove();
                            makeToast("Item successfully deleted","green","success");

                        }
                    }});
                }
            })
        })
    });
</script>
