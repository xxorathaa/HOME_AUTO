import * as React from "react";
import "./assets/css/style.scss";

// import logo from "./assets/images/logo.PNG";

class App extends React.Component {
  public render() {
    return (
      <div className="App">
        <table className="layoutTable">
          <tbody>
            <tr className="pageHeader">
              <td>{/* <img className="logo" src={logo} /> */}</td>
              <td>
                <h1>Home Automation Control Panel</h1>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    );
  }
}

export default App;
