import React, { Component } from 'react';
import { BrowserRouter as Router,Link, Route} from 'react-router-dom';
import Home from './Home';
import About from './About';
import AssetRequest from './AssetRequest/Index';
import AssetTransfer from './AssetTransfer/Index2';
import Exports from './Export/Exports';

import "@fortawesome/fontawesome-free/css/all.min.css";
import 'bootstrap-css-only/css/bootstrap.min.css'; 
import 'mdbreact/dist/css/mdb.css';

import {
  MDBNavbar, MDBNavbarBrand, MDBNavbarNav, MDBNavItem, MDBNavLink, MDBNavbarToggler, MDBCollapse, MDBFormInline,
  MDBDropdown, MDBDropdownToggle, MDBDropdownMenu, MDBDropdownItem
  } from "mdbreact";
  

export default class Header extends Component {

  constructor(props) {
    super(props);
    this.state = {
      isOpen: false
    };
}

  toggleCollapse() {
    this.setState({ isOpen: !this.state.isOpen });
  }
 

    render() {
        return (
            <Router>
            <div>

            <MDBNavbar color="indigo" dark expand="md">
        <MDBNavbarBrand>
          <strong className="white-text">Navbar</strong>
        </MDBNavbarBrand>
        <MDBNavbarToggler onClick={this.toggleCollapse} />
        <MDBCollapse id="navbarCollapse3" isOpen={this.state.isOpen} navbar>
          <MDBNavbarNav left>
            <MDBNavItem active>
              <MDBNavLink to="/">Home</MDBNavLink>
            </MDBNavItem>
            <MDBNavItem>
              <MDBNavLink to="/about">About</MDBNavLink>
            </MDBNavItem>
            <MDBNavItem>
              <MDBNavLink to="/requests">Requests</MDBNavLink>
            </MDBNavItem>
            <MDBNavItem>
              <MDBNavLink to="/transfers">Transfer</MDBNavLink>
            </MDBNavItem>
            <MDBNavItem>
              <MDBNavLink to="/exports">Exports</MDBNavLink>
            </MDBNavItem>
            <MDBNavItem>
              <MDBDropdown>
                <MDBDropdownToggle nav caret>
                  <span className="mr-2">Dropdown</span>
                </MDBDropdownToggle>
                <MDBDropdownMenu>
                  <MDBDropdownItem href="#!">Action</MDBDropdownItem>
                  <MDBDropdownItem href="#!">Another Action</MDBDropdownItem>
                  <MDBDropdownItem href="#!">Something else here</MDBDropdownItem>
                  <MDBDropdownItem href="#!">Something else here</MDBDropdownItem>
                </MDBDropdownMenu>
              </MDBDropdown>
            </MDBNavItem>
          </MDBNavbarNav>
          <MDBNavbarNav right>
            <MDBNavItem>
            
            </MDBNavItem>
          </MDBNavbarNav>
        </MDBCollapse>
      </MDBNavbar>

{/*
            <nav className="navbar navbar-expand-lg navbar-dark bg-primary">

<button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span className="navbar-toggler-icon"></span>
</button>

<div className="collapse navbar-collapse" id="navbarSupportedContent">
  <ul className="navbar-nav mr-auto">
    <li className="nav-item active">
      <Link className="nav-link" to="/">Home </Link>
    </li>
    <li className="nav-item">
      <Link className="nav-link" to="/about">About Us</Link>
    </li>
    <li className="nav-item">
      <Link className="nav-link" to="/requests">Requests</Link>
    </li>
    <li className="nav-item">
      <Link className="nav-link" to="/transfers">Transfers</Link>
    </li>
  </ul>
  <form className="form-inline my-2 my-lg-0">
    <input className="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
    <button className="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</div>
</nav>*/}
                
              
               <div>
                <Route exact path='/' component={Home}/>
                <Route exact path='/about' component={About}/>
                <Route exact path='/requests' component={AssetRequest}/>
                <Route exact path='/transfers' component={AssetTransfer}/>
                <Route exact path='/exports' component={Exports}/>
                </div>
            </div>
            </Router>
        );
    }
}

