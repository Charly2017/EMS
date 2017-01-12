<p>&nbsp;</p>

<div class="btn_top" style="margin-bottom:10px;">
    <div class="col-md-1">
        <button class="btn btn-primary" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus fa-lg"></i> Add</button>
    </div>
    <div class="col-md-1">
        <button class="btn btn-primary" id="salaryReport"><i class="fa fa-download fa-lg"></i> Salary report</button>
    <!--<button class="btn btn-primary" id="salaryReport"><i class="fa fa-search fa-lg"></i> Search</button>-->
    </div>
    <div class="col-md-10">
        <form enctype="multipart/form-data" id="searchForm" action="javascript:">        
            <div class="row">                
                <div class="col-md-9">
                    <input type="text" class="form-control form-control-success" id="keywordSearch" placeholder="Enter the keyword for the search">                    
                </div>  
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary pull-right" id="searchEmployeeForm"><i class="fa fa-search fa-lg"></i> Search</button>
                </div>                          
            </div>     
        </form>
        </div>
</div>

<div class="message alert alert-info" hidden="hidden"></div>


<div id="list_table">
</div>

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus fa-lg"></i> Add new employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form enctype="multipart/form-data" id="addForm" action="javascript:" class="form-horizontal">
      <div class="modal-body">          
                <div class="form-group">
                    <div class="col-md-4">Firstname</div>
                    <div class="col-md-4">
                        <input type="text" id="firstname" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">Lastname</div>
                    <div class="col-md-4">
                        <input type="text" id="lastname" class="form-control">
                    </div>
                </div>
                <div class="form-group">                    
                    <div class="col-md-4">Date of birth</div>                    
                    <div class="col-md-4">
                        <input type="text" id="dateofbirth" class="form-control" placeholder="YYYY-DD-MM">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">Email</div>
                    <div class="col-md-4">
                        <input type="email" id="email" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">Job Title</div>
                    <div class="col-md-4">
                        <input type="text" id="jobtitle" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">Salary</div>
                    <div class="col-md-4">
                        <input type="number" id="salary" class="form-control">
                    </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
    </form>
  </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit fa-lg"></i> Edit employee </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form enctype="multipart/form-data" id="editForm" action="javascript:" class="form-horizontal">
      <div class="modal-body"> 
            <input type="hidden" id="idEdit" class="form-control">         
<!--            <div class="row">-->
                <div class="form-group">
                    <div class="col-md-4">Firstname</div>
                    <div class="col-md-4">
                        <input type="text" id="firstnameEdit" class="form-control">
                    </div>
                </div>
<!--            </div>-->
<!--            <div class="row">-->
                <div class="form-group">
                    <div class="col-md-4">Lastname</div>
                    <div class="col-md-4">
                        <input type="text" id="lastnameEdit" class="form-control">
                    </div>
                </div>
<!--            </div>-->
<!--            <div class="row">-->
                <div class="form-group">
                    <div class="col-md-4">Date of birth</div>
                    <div class="col-md-4">
                        <input type="text" id="dateofbirthEdit" class="form-control">
                    </div>
                </div>
<!--            </div>-->
              <div class="form-group">
                  <div class="col-md-4">Email</div>
                  <div class="col-md-4">
                      <input type="email" id="emailEdit" class="form-control">
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-md-4">Job Title</div>
                  <div class="col-md-4">
                      <input type="text" id="jobtitleEdit" class="form-control">
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-md-4">Salary</div>
                  <div class="col-md-4">
                      <input type="number" id="salaryEdit" class="form-control">
                  </div>
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save edit</button>
      </div>
    </div>
    </form>
  </div>
</div>

<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-eye fa-lg"></i> View profile </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">         
            <div class="row">
                <div class="form-group">
                    <span class="ageEmployee"></span>
                </div>
            </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>        
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="salaryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-download fa-lg"></i> Salary report </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form enctype="multipart/form-data" id="salaryForm" action="javascript:">
      <div class="modal-body"> 
            <input type="hidden" id="idEdit" class="form-control">         
            <div class="row">
                <div class="form-group">
                    <div class="col-md-6">Please enter the salary maximum</div>
                    <div class="col-md-6">
                        <input type="text" id="salaryMax" class="form-control">
                    </div>
                </div>
            </div>            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Salary Report</button>
      </div>
    </div>
    </form>
  </div>
</div>

<script type="text/javascript" src="js/controller.js">

</script>