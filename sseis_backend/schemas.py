from datetime import date, time
from pydantic import BaseModel, Field, Required
from typing import Union

class UsuarioBase(BaseModel):
    usuario: Union[str, None] = None
    password: Union[str, None] = None
    cargo : Union[str, None] = None
    nivel_acceso : Union[int, None] = Field(None, gt=0)

class UsuarioCreate(UsuarioBase):
    pass

class UsuarioUpdate(UsuarioBase):
    pass

class Usuario(UsuarioBase):
    id: int

    class Config:
        orm_mode = True