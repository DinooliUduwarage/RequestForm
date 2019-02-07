import React, { Component } from 'react';
import { MDBCol, MDBContainer, MDBRow, MDBFooter } from "mdbreact";

export default class Footer extends Component {
    render() {
        return (
            <div>
                <MDBFooter color="blue" className="font-small pt-4 mt-4">

      <div className="footer-copyright text-center py-3">
        <MDBContainer fluid>
          &copy; {new Date().getFullYear()} Copyright: <a href="https://www.simct.com/">Sim Centric Technologies </a>
        </MDBContainer>
      </div>
    </MDBFooter>
 
        

            </div>
        );
    }
}

