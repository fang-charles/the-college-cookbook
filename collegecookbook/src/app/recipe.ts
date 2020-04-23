export class Recipe {
	constructor(
	   public recipeName: string,
	   public ingredient1: string,
	   public ingredient2: string,
	   public ingredient3: string,
	   public ingredient4: string,
	   public ingredient5: string,
	   public ingredient6: string,
	   public ingredient7: string,
	   public ingredient8: string,
	   public ingredient9: string,
	   public ingredient10: string,

	   public step1: string,
	   public step2: string,
	   public step3: string,
	   public step4: string,
	   public step5: string,
	   public step6: string,
	   public step7: string,
	   public step8: string,
	   public step9: string,
	   public step10: string,

	   public numIngredients: number,
	   public numSteps: number,

	   public username: string,
	   public recipeId: string
	){}

	getSteps(){
		let stepString ="";
		let key = "step";
		for (let i = 1; i <= this.numSteps; i++){
			key = "step" + i;
			stepString += i + ". " + this[key] + "<br> ";
		}
		return stepString;
	}

  getColor(type) {
    switch (type) {
      case 'recipeName':
        return 'blue';
    }
  }

  getFont(type){
	  switch (type) {
      case 'recipeName':
        return 'raleway';
    }
  }

 }

