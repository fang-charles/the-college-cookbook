import { Component } from '@angular/core';
import { HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';
import { Order } from './order';
import { Recipe } from './recipe';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})

export class AppComponent {
  title = 'collegecookbook';
  authors = 'your name';

  constructor(private http: HttpClient) {   }

  // Let's create a property to store a response from the back end
  // and try binding it back to the view
  responsedata = new Order('');

  orderModel = new Order('');


  orderArray = [new Order('Order 1'),
                new Order('Order 2'),
                new Order('Order 3')
    ];

  recipeArray = [];

  confirm_msg = '';
  data_submitted = '';

  confirmOrder(data) {
     console.log(data);
     this.confirm_msg = 'Search Term: ' + data.searchTerm;
  }


  // Assume we want to send a request to the backend when the form is submitted
  // so we add code to send a request in this function

  onSubmit(form: any): void {
     console.log('You submitted value: ', form);
     this.data_submitted = form;

     // Convert the form data to json format
     const params = JSON.stringify(form);
     console.log('Params: ', params);

     // To send a GET request, use the concept of URL rewriting to pass data to the backend
     // this.http.get<Order>('http://localhost/cs4640/inclass11/ngphp-get.php?str='+params)
     // To send a POST request, pass data as an object
     this.http.post<Order>('http://localhost/the-college-cookbook/collegecookbook/angularBackend.php', params)
     .subscribe((data) => {
          // Receive a response successfully, do something here

          this.recipeArray = [];
          this.responsedata = data;     // assign response to responsedata property to bind to screen later

          for (let i = 0; i < Object.keys(data).length; i++) {
              this.recipeArray.push(new Recipe(data[i]['recipeName'], data[i]['ingredient1'], data[i]['ingredient2'], data[i]['ingredient3'],
              data[i]['ingredient4'], data[i]['ingredient5'], data[i]['ingredient6'], data[i]['ingredient7'], data[i]['ingredient8'], data[i]['ingredient9'],
              data[i]['ingredient10'], data[i]['step1'], data[i]['step2'], data[i]['step3'], data[i]['step4'], data[i]['step5'], data[i]['step6'], data[i]['step7'],
              data[i]['step8'], data[i]['step9'], data[i]['step10'], data[i]['numIngredients'], data[i]['numSteps'], data[i]['username'], data[i]['recipeId']));
          }

     }, (error) => {
          // An error occurs, handle an error in some way
          console.log('Error ', error);
     });
  }
}
