                                                                  ▒▒██▒▒▒▒▒▒▒▒▒▒░░                                                                  
                                                                ▒▒████████████████                                                                  
                                                                ████████████████████                                                                
                                                              ░░████████████████████                                                                
                                                              ░░████░░░░░░██░░░░▒▒██                                                                
                                                              ░░██░░░░░░░░▓▓░░░░▒▒██                                                                
                                                                ████░░░░░░░░░░░░▒▒                                                                  
                                                                ▒▒██████▓▓▓▓▓▓▓▓██                                                                  
                                                                  ████████▓▓▓▓▓▓▓▓██                                                                
                                                                  ▓▓██████████████▓▓                                                                
                                                                    ▓▓██████████▓▓                                                                  
                                                                ▒▒▒▒▒▒▓▓▓▓▓▓▓▓▒▒                                                                    
                                                            ▒▒▒▒▓▓▒▒▒▒▒▒▒▒▒▒▒▒▒▒░░              ████                                                
                                                        ░░░░▒▒▒▒  ▓▓▒▒▒▒▒▒▒▒▒▒▒▒▒▒              ████                                                
                                                    ░░░░          ▓▓▒▒▒▒▒▒▒▒▒▒▒▒  ░░░░      ░░░░                                                    
                                                    ░░░░          ▓▓▒▒▒▒▒▒▒▒▒▒▒▒    ░░░░    ░░                                                      
                                                    ░░░░          ▓▓▒▒▒▒▒▒▒▒▒▒▒▒      ░░░░░░                                                        
                                                    ░░░░          ▓▓▒▒▒▒▒▒▒▒▒▒▒▒        ░░░░                                                        
                                                    ▒▒▒▒          ▓▓▒▒▓▓▒▒▒▒▒▒▒▒                                                                    
                                                    ████          ▓▓▓▓▓▓▒▒▒▒▒▒░░                                                                    
                                                    ████          ▓▓▓▓▓▓▓▓░░▓▓▒▒                                                                    
                                                    ▒▒▒▒          ▓▓▓▓▓▓▓▓▒▒▓▓▒▒                                                                    
                                                                  ████████████▓▓                                                                    
                                                                  ██▓▓      ██▓▓                                                                    
                                                    ░░            ████      ▒▒██                                                                    
                                                  ▒▒██            ████        ██▒▒                                                                  
                                                ▓▓████████        ██▒▒        ░░██                                                                  
                                                ▓▓    ▓▓▓▓████  ▒▒▓▓          ░░██                                                                  
                                                          ▒▒▒▒██▓▓              ▒▒██                                                                
                                                              ░░░░              ░░██▒▒                                                              
                                                                                  ▓▓██░░  ░░                                                        
                                                                                    ████▒▒▓▓                                                        
                                                                                      ████                                                          
                                                                                      ██                                                            


# --------------- Thieves ---------------

## WIP

This is a Work In Progress!

Many bugs are known, many features lack, and there are a ton of dialogs that are still to be written :)

## Installation

```
artisan migrate:fresh --seed
npm install
npm run dev
```

## Login

Same email addresses than in Speedbots, with `password` as password.

## Goal

The goal is to catch a thief. To do so, you have to travel around the world virtually,
and ask questions to numerous people in different countries, towns and buildings.

When you learn something about the thief, you record this information, and that will
narrow the suspects list, down to one eventually. Then you can issue a warrant.

## Create clues

Player will be able to create clues for countries. This means that dialogs
from NPCs will contain these player generated content.

This also means that a moderation is done on these items. They will only appear
once accepted by a moderator.
