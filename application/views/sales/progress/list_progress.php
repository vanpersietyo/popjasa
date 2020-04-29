<?php
/**
 * Created by PhpStorm.
 * User: PC-06
 * Date: 03/12/2019
 * Time: 15:07
 */

/** @var CI_Controller $this */
$this->load->view('template/head');
?>
<style media="screen">
label {
  display: inline-block;
  margin-bottom: .5rem;
  font-size: 18px;
  font-weight: 500;
}
</style>
<!-- END Custom CSS-->
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title">Update Progress By Project</h3>
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><p class="danger"></p>
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>


    <div class="content-body">
      <section class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <h5 class="text-bold-500" >Daftar Project Confimed : </h5>
                <br>
                <!-- Invoices List table -->
                <div class="table-responsive">
                  <table id="table" class="table table-striped table-bordered sourced-data">
                    <thead>
                      <tr>
                        <th width="5%"></th>
                        <th>ID Project</th>
                        <th>Nama Customer</th>
                          <?php if ($this->session->userdata('akses_user')!='OPS'){ ?>
                              <th>Jumlah Penjualan</th>
                          <?php } ?>
                        <th>Status</th>
                        <th>Perusahaan</th>
                        <th>Tgl</th>
                        <th>Operator</th>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>

                  </table>
                </div>
                <!--/ Invoices table -->
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>

<script type="text/javascript">

var table;
var base_url = '<?php echo base_url();?>';

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('transaksi/progress/ajax_list')?>",
            "type": "POST"
        },
        "order": [[ 6, "desc" ]],

        dom: 'Bfrtip',
        buttons: [
            'excel'
        ],
        drawCallback: function (e) {
            var c = this.api(),
                r = c.rows({
                    page: "current"
                }).nodes(),
                i = null;
            c.column(5, {
                page: "current"
            }).data().each(function (e, c) {
                i !== e && ($(r).eq(c).before('<tr class="group"><td colspan="9">' + e + "</td></tr>"), i = e)
            })
        }
    });

    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,
    });

    //set input/textarea/select event when change value, remove class error and remove text help block
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });


    //check all
    $("#check-all").click(function () {
        $(".data-check").prop('checked', $(this).prop('checked'));
    });

});

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax
}


</script>
<script type="text/javascript">
function create(ID){
     location.replace("<?php echo base_url('transaksi/project/detail/')?>"+ID);
   }

 function update_track(ID){
      location.replace("<?php echo base_url('transaksi/progress/update_track/')?>"+ID);
    }

function invoice(ID){
        window.open("<?php echo base_url('report/sales/invoice/cetak/')?>"+ID, 'thePopup', 'width=800,height=500',);
  }

</script>

<?php $this->load->view('./template/foot'); ?>
