

import React, { Component } from 'react';
import axios from 'axios';
import {Link} from 'react-router-dom';
import { MDBBtn } from "mdbreact";

export default class View extends Component {
    constructor(props) {
        super(props);

        
        this.state = {
            arequests:[],//initially empty ,set when onsubmit is successfull
            arequests_status:'0',
        }
      
    }
    
    componentDidMount(){
        axios.get('http://127.0.0.1:8000/api/requests')
        .then(response=>{
          this.setState({
            arequests:response.data
        });
      });
    }
 /*

onDelete(arequest_id){
    axios.delete('http://127.0.0.1:8000/api/request/delete/'+arequest_id).
    then(response=>{ 
        //removing the deleted items from the front end 
      var arequests=this.state.arequests;
  
      for(var i=0;i<arequests.length;i++){
        if(arequests[i].id==arequest_id)
        {
            arequests.splice(i,1);
          this.setState({arequests:arequests});
        }
      }
      
        this.setState({ alert_message: "success" })
    }).catch(error => {
        this.setState({ alert_message: "error" });
    })
  
  }

*/
  onApprove(){
    this.setState({ arequests_status: 1 });
    console.log(this.state.arequests_status);
  }

  
  onReject(){
    this.setState({ arequests_status: 0 });
    console.log(this.state.arequests_status);
  }

  
    render() {
        return (
            <div>
                <hr />

                <table className="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Asset</th>
                            <th scope="col">From</th>
                            <th scope="col">To</th>
                            <th scope="col">Reason</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>

                        </tr>

                    </thead>
                    <tbody>
                    {
                        this.state.arequests.map(arequest=>{ 
                          return (
                                 <tr key={arequest.id}>
                                   <td>{arequest.id}</td>
                                   <td>{arequest.type}</td>
                                   <td>{arequest.from}</td>
                                   <td>{arequest.to}</td>
                                   <td>{arequest.reason}</td>
                                   <td>{arequest.description}</td>
                                   <td>{arequest.status==0?("Not approved yet"):("Approved")}</td>
                                   <td> 
                                   <MDBBtn  onClick={this.onApprove.bind(this)}  size="sm" outline color="info">Approve</MDBBtn>&nbsp;
                                   <MDBBtn  onClick={this.onReject.bind(this)}  size="sm" outline color="danger">Reject</MDBBtn>
                                  
                                  
                                    </td>
                                 </tr>
                                 )
                         })
                        
                      }


                    </tbody>
                </table>





             {/*}   <div className="card bg-light mt-3">
        <div className="card-header">
            Laravel 5.7 Import Export Excel to database Example - ItSolutionStuff.com
        </div>
        <div className="card-body">
            <form  >
             
            <Link to={'/api/export'} >Edit</Link>
                <button className="btn btn-warning" href="http://127.0.0.1:8000/api/export" >Export User Data</button>
            </form>
        </div>
    </div>
*/}
            </div>
        );
    }
}

