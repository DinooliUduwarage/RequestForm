import React, { Component } from 'react';
import {BrowserRouter as Router,Link,Route} from 'react-router-dom';
//import Add from "./Store";
import List from "./List";
import Edit from "./Edit";
import Store from './Store';
import View from './View';
import { MDBBtn } from "mdbreact";

export default class Index extends Component {
    render() {
        return (
           <div>
              <Router>
               <div> {/*wrapping inside div is a must*/}
                   <hr/>
                   <Link to="/requests" className="btn btn-primary" >{/*<MDBBtn active color="info">Your Requests</MDBBtn>*/}Your Requests</Link> &nbsp;
                   <Link to="/request/store" className="btn btn-primary">{/*<MDBBtn active  color="info">New Request</MDBBtn>*/}New Request</Link> &nbsp;
                   <Link to="/request/view" className="btn btn-primary">{/*<MDBBtn active  color="info">Approve</MDBBtn>*/}Approve</Link>
                   

                   <Route exact path="/requests" component={List}/>
                   <Route exact path="/request/store" component={Store}/>
                  <Route exact path="/request/edit/:id" exact component={Edit}/>
                  <Route exact path="/request/view" component={View}/>
               </div>
               </Router>
           </div>
        );
    }
}

