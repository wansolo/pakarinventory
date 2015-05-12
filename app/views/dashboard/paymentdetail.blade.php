
        @if(count($paymentdetail) > 0)
					<div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                      <th class="bold">Item Name</th>
                  
                                      <th class="bold">Cost</th>
                                       <th class="bold">Payment Date</th>
                                      
                                       
                                    </thead>
                                    <tbody>
                                      
                                      @foreach($paymentdetail as $underlist_item)
                                        
                                        <tr>
                                        
                                        <td >{{$underlist_item->item->item_name}}</td>
                                        <td >{{$underlist_item->amount}}   </td>
                                        <td >{{$underlist_item->doa}}</td>
                                           </tr>
                                      @endforeach
                                      <tr>
                                        
                                      </tr>
                                    </tbody>
                                        
  
                                    
                                </table>

                                Total Cost = {{$total}} {{ "  "}} Cedis
            </div>
        
        @endif