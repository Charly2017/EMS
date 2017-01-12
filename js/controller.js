function removeEmployee(employee_id){
                console.log(employee_id);
                if(confirm("Are you sure want to remove this employee : "+employee_id)){
                    for(var i=0;i<listEmployee.length;i++){
                        if(listEmployee[i]["id"] == employee_id){
                            listEmployee.splice(i,1);
                        }
                    }
                    $("#list_table").empty();
                    formatTable(listEmployee);
                    $.ajax({
                         async: false,
                         url: "controllers/supp_ctrl.php?employee_id="+employee_id,
                         type: "GET",
                         contentType: "application/json",
                         success: function(res){
                             $(".message").empty();
                             $(".message").show();
                             $(".message").append(res);
                             setTimeout(function(){
                                $(".message").hide('slow');

                            },3000)  

                         },
                         error: function(error){
                             console.log(error)
                         }
                     })
                }else {
                    console.log("NO")
                }
}

function editEmployee(employee_id){
    $.ajax({
        async: false,
        url: "controllers/edit_ctrl.php?employee_id="+employee_id+"&edit=0",
        type: "GET",
        contentType: "application/json",
        success: function(res){
            console.log(res) 
            $("#idEdit").val(res["response"]["id"]);           
            $("#firstnameEdit").val(res["response"]["firstname"]);
            $("#lastnameEdit").val(res["response"]["lastname"]);
            $("#dateofbirthEdit").val(res["response"]["dateofbirth"]);
            $("#emailEdit").val(res["response"]["email"]);
            $("#jobtitleEdit").val(res["response"]["jobtitle"]);
            $("#salaryEdit").val(res["response"]["salary"]);
            $("#editModal").modal('show');
            
        },
        error: function(error){
            console.log(error)
        }
    });
}

function viewProfile(employee_id){
    $.ajax({
        async: false,
        url: "controllers/edit_ctrl.php?employee_id="+employee_id+"&edit=2",
        type: "GET",
        contentType: "application/json",
        success: function(res){
            console.log(res) 
            $data = res["response"]["firstname"]+" "+res["response"]["lastname"]+" a "+res["age"]+" ans";
            $(".ageEmployee").html($data);
            $("#viewModal").modal('show');
            
        },
        error: function(error){
            console.log(error)
        }
    });
}

function formatTable(res){
    var tab_begin = "<table class='table'>"
    var head = "<thead class='thead'><tr><th>Firstname</th><th> Lastname</th><th> Date of birth</th><th> Email</th><th> Job title</th><th> Salary</th><th> Action</th></tr></thead><tbody>"
    var content = ""
    for(var i=0; i<res.length; i++){
        content += "<tr class='tr_content'><th>"+res[i]["firstname"]+"</th><th>"+res[i]["lastname"]+"</th><th>"+res[i]["dateofbirth"]+"</th><th>"+res[i]["email"]+"</th><th>"+res[i]["jobtitle"]+"</th><th>"+res[i]["salary"]+"</th><th> <i class=\"fa fa-edit fa-lg action\" onclick=\"javascript:editEmployee('"+res[i]["id"]+"')\"></i><i class=\"fa fa-trash fa-lg action\" onclick=\"javascript:removeEmployee('"+res[i]["id"]+"')\"></i><i class=\"fa fa-eye fa-lg action\" title='View profile' onclick=\"javascript:viewProfile('"+res[i]["id"]+"')\"></i></th></tr>";
    }
    var tab_end = "</tbody></table>"
    var data = tab_begin+head+content+tab_end;
    $("#list_table").append(data);
}
var listEmployee;
$(document).ready(function(){ 
           /* List all employee */
            $.ajax({
                async: false,
                url: "controllers/list_ctrl.php",
                type: "GET",
                contentType: "application/json",
                success: function(res){
                    listEmployee = res;
                    formatTable(res);
                },
                error: function(error){
                    console.log(error)
                }
            });


            /* Add new employee */
            $("#addForm").submit(function(event){
                event.preventDefault();
                var firstname = $("#firstname").val();
                var lastname = $("#lastname").val();
                var dateofbirth = $("#dateofbirth").val();
                var jobtitle = $("#jobtitle").val();
                var salary = $("#salary").val();
                var email = $("#email").val();
                var data = {
                    firstname: firstname,
                    lastname: lastname,
                    dateofbirth: dateofbirth,
                    salary: salary,
                    email: email,
                    jobtitle: jobtitle
                }

                $.ajax({
                    async: false,
                    url: "controllers/add_ctrl.php",
                    type: "POST",
                    data: data,
                    success: function(res){
                        $("#addModal").modal("hide");
                        listEmployee.push(res);
                        $("#list_table").empty();
                        formatTable(listEmployee);                        
                    },
                    error: function(error){
                        console.log(error)
                    }
                })
               
            });

            /* Edit employee */
            $("#editForm").submit(function(event){
                event.preventDefault();                
                var employee_id = $("#idEdit").val();
                var firstname = $("#firstnameEdit").val();
                var lastname = $("#lastnameEdit").val();
                var dateofbirth = $("#dateofbirthEdit").val();
                var email = $("#emailEdit").val();
                var jobtitle = $("#jobtitleEdit").val();
                var salary = $("#salaryEdit").val();
                var data = {                    
                    firstname: firstname,
                    lastname: lastname,
                    dateofbirth: dateofbirth,
                    email: email,
                    jobtitle: jobtitle,
                    salary: salary
                }

                $.ajax({
                    async: false,
                    url: "controllers/edit_ctrl.php?employee_id="+employee_id+"&edit=1",
                    type: "POST",
                    data: data,
                    success: function(res){
                        $("#editModal").modal("hide");
                        for(var i=0;i<listEmployee.length;i++){
                            if(listEmployee[i]["id"] == res["response"]["id"]){
                                listEmployee[i] = res["response"];
                            }
                        }                                              
                        $("#list_table").empty();
                        formatTable(listEmployee);
                        $(".message").empty();
                        $(".message").show();
                        $(".message").append(res["message"]);    
                        setTimeout(function(){
                            $(".message").hide('slow');
                        },3000)                                  
                    },
                    error: function(error){
                        console.log(error)
                    }
                })
               
            });

            /* Salary report */
            $("#salaryModal").submit(function(event){
                var salaryMax = $("#salaryMax").val();
                console.log(salaryMax);
                $.ajax({
                    async: false,
                    url: "controllers/salary_ctrl.php?salaryMax="+salaryMax,
                    type: "GET",                    
                    success: function(res){
                        console.log(res);
                        var link = document.createElement("a");
                        link.download = "salary_report.csv";
                        link.href = "http://localhost/EMS/controllers/salary_report.csv";
                        link.click();
                        $("#salaryModal").modal("hide");                   
                    },
                    error: function(error){
                        console.log(error)
                    }
                })
            });

            /* Open a salary modal */
            $("#salaryReport").click(function(){
                $("#salaryModal").modal('show');
            });

            /* Search employee */
            $("#searchForm").submit(function(event){
                event.preventDefault(); 
                var data = $("#keywordSearch").val();               
                $.ajax({
                    async: false,
                    url: "controllers/search_ctrl.php?data="+data,
                    type: "GET",      
                    success: function(res){
                        $("#list_table").empty();
                        formatTable(res);
                    },
                    error: function(error){
                        console.log(error)
                    }
                })
            });


           

           
        })