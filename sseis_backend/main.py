from re import template
from fastapi import Depends, FastAPI, HTTPException, status, Request, Response, Form
from fastapi.middleware.cors import CORSMiddleware
from sqlalchemy.orm import Session
from fastapi.templating import Jinja2Templates
from fastapi.responses import HTMLResponse, FileResponse


import crud, models, schemas
from database import SessionLocal, engine

# Configuration

models.Base.metadata.create_all(bind=engine)

app = FastAPI()

origins = ["*"]

app.add_middleware(
    CORSMiddleware,
    allow_origins=origins,
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],

)

# Dependencia - Obtiene la BD
def get_db():
    db = SessionLocal()
    try: 
        yield db
    finally:
        db.close()


#HTML RESPONSES PRUEBAS LOGIN
@app.get("/")
def root(request: Request):
    return template.TemplateResponse("index.html", {"request":request})

@app.post("/user/", response_class=HTMLResponse,response_model=schemas.Usuario, status_code=status.HTTP_200_OK)
def user(request: Request, us:str = Form(), passw: str = Form(), db: Session = Depends(get_db)):
    html_address= "./views/index.html"
    us_1= db.query(models.Usuario).filter(models.Usuario.usuario == us).first()
    con_1= db.query(models.Usuario).filter(models.Usuario.password == passw).first() 
    if us_1:
        if con_1:
            return template.TemplateResponse("./views/vista_administrador.html", {"request":request})
    return FileResponse(html_address, status_code=201)
#####################################


# Path Operations for Creating Data
@app.post("/usuarios/", response_model=schemas.Usuario, response_model_exclude={"password"})
async def create_usuario(usuario: schemas.UsuarioCreate, db: Session = Depends(get_db)):
    # Validaciones extra
    return crud.create_usuario(db, usuario)

# Path Operations for Reading Data

@app.get("/usuarios/", response_model=list[schemas.Usuario])
def get_usuarios(skip: int = 0, limit: int = 100, db: Session = Depends(get_db)):
    usuarios = crud.get_usuarios(db, skip=skip, limit=limit)
    return usuarios


#Actualizar Usuario - C, adición de status
@app.put("/usuarios/{id_us}", response_model=schemas.Usuario, status_code=status.HTTP_200_OK)
def update_usuarios(id_us:int, us:schemas.UsuarioBase, db: Session = Depends(get_db)):
    return crud.update_usuarios(db, id_us, us)

# Delete Users - Y
@app.delete("/usuarios/{id_usuario}")
def eliminar_usuario(id_usuario:int, db: Session = Depends(get_db)):
    return crud.delete_usuario(id_usuario, db)
    