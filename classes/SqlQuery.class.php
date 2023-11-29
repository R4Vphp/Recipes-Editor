<?php

abstract class SqlQuery {

    const GET_ALL_RECIPES = "SELECT * FROM recipes ORDER BY title ASC";
    const GET_INGREDIENTS_FROM_RECIPE = "SELECT * FROM ingredients WHERE recipeId = :recipeId ORDER BY title ASC";
    
    const CREATE_RECIPE =
    "INSERT INTO
        recipes(
            id,
            title,
            creation_time
        )
    VALUES(
        :recipeId,
        :title,
        :creation_time
    )";
    const RENAME_RECIPE = "UPDATE recipes SET title = :title WHERE id = :recipeId";
    const DELETE_RECIPE = "DELETE FROM ingredients WHERE recipeId = :recipeId; DELETE FROM recipes WHERE id = :recipeId";
    
    const ADD_INGREDIENT =
    "INSERT INTO
        ingredients(
            id,
            recipeId,
            title,
            amount,
            unit
        )
    VALUES(
        :id,
        :recipeId,
        :title,
        :amount,
        :unit
    )";
    const DELETE_INGREDIENT = "DELETE FROM ingredients WHERE id = :id";
    
}