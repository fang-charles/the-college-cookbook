import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, FormArray, FormControl } from '@angular/forms';
import { Recipe, Ingredients } from '../recipe'

@Component({
  selector: 'app-recipe',
  templateUrl: './recipe.component.html',
  styleUrls: ['./recipe.component.css']
})
export class RecipeComponent implements OnInit {

  constructor(private fb: FormBuilder) { }

  recipe: FormGroup;
  ngOnInit(): void {
    /* Initiate the form structure */
    this.recipe = this.fb.group({
      name: [],
      ingredients: this.fb.array([this.fb.group({ingredient:''})])
    })
  }

  get Ingredients() {
    return this.recipe.get('ingredients') as FormArray;
  }

  addIngredient() {
    this.Ingredients.push(this.fb.group({ingredient:''}));
  }

  deleteIngredient(index) {
    this.Ingredients.removeAt(index);
  }


}
