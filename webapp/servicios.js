/**
 * Sample Web Service
 * This is a sample service class that uses fetch and promises.
 *
 * I am using the http://httpbin.org endpoint to ensure this example is working properly.
 *
 * @class WebService
 */
class WebService {	
  constructor(param) { this.parametro = param; }

  /**
   * Sample Get Fetch using HTTP Bin
   *
   * @example
      var service = new WebService();
      service.Get().then((success => {
        console.log(success);
      }))
   * @memberof WebService
   * @returns {Promise}
   */
  Get() {
    return new Promise((resolve, reject) => {
      // We fetch the API endpoint    	
      fetch('http://localhost/satrapia/satrapia/controlador/cliente.php?funcion='+this.parametro).then((response) => {
        if (response.status !== 200) {
          // Not success
          resolve(response.text());
        } else {
          // success
        	resolve(response.json());
        }
      }).catch(err => {
        // Service Error
        reject(err);
      });
    });
  }

  /**
   * Sample Post Fetch using HTTP Bin
   * @example
        var service = new WebService();
        service.Post({
          custname: 'John Doe',
          custemail: 'test@test.com'
        }).then(success => {
          console.log(success);
        })
   * @param {Object} object This is the form data.
   * @memberof WebService
   * @returns {Promise}
   */
  Post(object) {
    return new Promise((resolve, reject) => {
      // We create a new form
      var formData = new FormData();

      // we add all object items to the new form
      forEach(object, (value, key) => {
        formData.append(key, value);
      });

      // We fetch Post the API
      fetch('https://httpbin.org/post', {
        method: 'post',
        body: formData
      }).then((response) => {
        if (response.status !== 200) {
          // Not success
          resolve(response.text());
        } else {
          // Success
          resolve(response.text());
        }
      }).catch(err => {
        // Service Error
        reject(err);
      });
    });
  }
}