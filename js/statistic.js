$(document).ready(function(){ 
    /**
     * load statistic
     * 
     * 
     */
    
    $( "#load-statistic-button" ).click( (e) =>{
        const startdate = $( "#startdate" ).val();
        const enddate = $( "#enddate" ).val();
        const ctx = document.getElementById('myChart');
        const divalert = $( ".alert" );   
        $.ajax({
            url: "/modules/user/statistic.php",
            method: "POST",
            data: {startdate, enddate},
            dataType: "JSON",
            beforeSend: () => {
                divalert.prop("hidden", true);
                $( "#myChart" ).prop('hidden', true);
                $( "#load-statistic-button" ).prop('disabled', true);
                $( ".container#statistic").append('<div class="cssload-loader"><div class="cssload-inner cssload-one"></div><div class="cssload-inner cssload-two"></div><div class="cssload-inner cssload-three"></div></div>');
            },
            success: (serverdata) => {

               $( ".cssload-loader").detach();
                $( "#load-statistic-button" ).prop('disabled', false);
                 if (serverdata) {
                    $( "#myChart" ).prop('hidden', false);
                    divalert.prop("hidden", true);
                    const obdata = {
                        type: 'line',
                        data: {
                            labels: serverdata['date'],
                            datasets: [{
                                label: 'Ккал',
                                data: serverdata['callories'],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                    
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                    
                                ],
                                borderWidth: 2
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    };
                    const myChart = new Chart(ctx, obdata);
                } else {
                    divalert.html("Данные отсутствуют, попробуйте другой день").prop("hidden", false);
                }
            }
            })
    });
    }) //end