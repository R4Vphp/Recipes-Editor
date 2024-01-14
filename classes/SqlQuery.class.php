<?php

abstract class SqlQuery {

    const GET_ALL_RECIPES = "SELECT * FROM recipes WHERE userId = :userId ORDER BY title ASC";
    const GET_INGREDIENTS_FROM_RECIPE = "SELECT * FROM ingredients WHERE recipeId = :recipeId ORDER BY title ASC";
    
    const CREATE_RECIPE =
    "INSERT INTO
        recipes(
            id,
            userId,
            title,
            creation_time
        )
    VALUES(
        :recipeId,
        :userId,
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

    const CREATE_ACCOUNT = "INSERT INTO users(id, username, email, password, registerDate) VALUES(:id, :username, :email, :password, :registerDate)";
    const GET_ID_BY_UID = "SELECT id FROM users WHERE username = :uid OR email = :uid";
    const GET_USER_PASSWORD_HASH = "SELECT password FROM users WHERE id = :userId";
    const GET_USER = "SELECT id, username, email, registerDate FROM users WHERE id = :userId";
    const LOG = "INSERT INTO logs(userId, logTime, ip, success) VALUES(:userId, :logTime, :ip, :success)";
    
}