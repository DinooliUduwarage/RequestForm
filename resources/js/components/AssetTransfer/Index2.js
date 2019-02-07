import React, { Component } from 'react';//
import {BrowserRouter as Router,Link,Route} from 'react-router-dom';
import Store2 from "./Store2";
import List2 from "./List2";


export default class Index2 extends Component {
    render() {
        return (
           <div>
              <Router>
               <div> {/*wrapping inside div is a must*/}
                   <hr/>
                   <Link to="/transfers" className="btn btn-primary">Transfers</Link> &nbsp;
                   <Link to="/transfer/store" className="btn btn-primary ">New Transfer</Link>
                   
                   <Route exact path="/transfers" component={List2}/>
                   <Route exact path="/transfer/store" component={Store2}/>
                 {/* <Route exact path="/request/edit/:id" exact component={Edit}/>*/}
                   
               </div>
               </Router>
           </div>
        );
    }
}

