/**
 * Created by Aaron Young on 6/3/2016.
 */

BSQUARED.Destinations = (function(){

    var destinations = {

        "profile": {
            "destination_ID": 20
        },
        "statement": {
            "destination_ID": 21
        },

        "portfolioPicture" : {
            "destination_ID": 36
        },

        "about": {
            "1" :{
                "columnDestination" : 7,
                "labelDestination" : 22,
                "image": 22
            },
            "2" :{
                "columnDestination" : 8,
                "labelDestination" : 23,
                "image": 23
            },

            "3" :{
                "columnDestination" : 9,
                "labelDestination" : 24,
                "image": 24
            }
        },

        "skills": {

            "1" : {
                "columnDestination" : 4,
                "labelDestination" : 1,
                "image": 1
            },

            "2" : {
                "columnDestination" : 5,
                "labelDestination" : 2,
                "image": 2
            },

            "3" : {
                "columnDestination" : 6,
                "labelDestination" : 3,
                "image": 3
            }
        },

        "resume": {
            "destination_ID": 35
        },

        "works": {

            "1": {
                "previewDestination": 25,
                "thumbDestination": 10,
                "general": 10
            },

            "2": {
                "previewDestination": 26,
                "thumbDestination": 11,
                "general": 11
            },

            "3": {
                "previewDestination": 27,
                "thumbDestination": 12,
                "general": 12
            },

            "4": {
                "previewDestination": 28,
                "thumbDestination": 13,
                "general": 13
            },

            "5": {
                "previewDestination": 29,
                "thumbDestination": 14,
                "general": 14
            },

            "6": {
                "previewDestination": 30,
                "thumbDestination": 15,
                "general": 15
            },

            "7": {
                "previewDestination": 31,
                "thumbDestination": 16,
                "general": 16
            },

            "8": {
                "previewDestination": 32,
                "thumbDestination": 17,
                "general": 17
            },

            "9": {
                "previewDestination": 33,
                "thumbDestination": 18,
                "general": 18
            }
        }
    };

    return {

        init : function(){

        },

        searchLists: function(key, optionValue, value){
           return destinations[key][optionValue][value];
        },
        
        searchListKeyValue : function (key, optionValue){
            
        }
    }


})();